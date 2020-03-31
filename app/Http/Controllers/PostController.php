<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;

class PostController extends Controller
{

    protected $post = null;
    protected $category = null;
    protected $post_category = null;

    public function __construct(Post $post,Category $category, PostCategory $post_category)
    {
        $this->post = $post;
        $this->category = $category;
        $this->post_category = $post_category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allPost = $this->post->latest()->get();
        return view('admin.pages.posts', compact('allPost'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->category->get();
        return view('admin.pages.add_post', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = $this->post->getRules();
        $request->validate($rules);
        $data = $request->all();
        $data['title'] = $request->title;
        $data['slug'] = $request->slug;
        $data['excerpt'] = $request->excerpt;
        $data['description'] = $request->description;
        $data['slug'] = $request->slug;
        $data['is_featured'] = $request->is_feature;
        $data['language'] = $request->language;
        $data['status'] = $request->status;
        $data['image'] = $request->image;
        $data['author_id'] = \Auth::user()->id;
        $data['image_caption'] = $request->image_caption;
        $data['caption_link'] = $request->caption_link;
        $this->post->fill($data);
        $status = $this->post->save();
        $post_id = $this->post->id;
        if($status){
            if(!empty($request->category_id)){
                for($j = 0; $j < count($request->category_id); $j++){
                  $post_category = new PostCategory();
                  $category_data['category_id'] = $request->category_id[$j];
                  $category_data['post_id'] = $post_id;
                  $post_category->fill($category_data);
                  $post_category->save();
                }
            }
            $request->session()->flash('success','Post created successfully.');
        } else {
            $request->session()->flash('error','Problem while creating post.');
        }
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->post->find($id);
        if(!$data) {
            request()->session()->flash('error','Post not found');
            return redirect()->back();
        }
        $post_categories = $this->post_category->select('category_id')->where('post_id', $id)->get()->toArray();
        $categories = $this->category->get();
        return view('admin.pages.add_post', compact('categories','data', 'post_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->post = $this->post->find($id);
        if(!$this->post) {
            request()->session()->flash('error','Post not found');
            return redirect()->back();
        }
        $rules = $this->post->getRules('update');
        $request->validate($rules);
        $data = $request->all();
        $this->post->fill($data);
        $success = $this->post->save();
        $post_id = $this->post->id;
        if($success){
            if(!empty($request->category_id)){
                $del_image = $this->post_category->where('post_id', $id)->delete();
                for($j = 0; $j < count($request->category_id);){
                    $post_category = new PostCategory();
                    $category_data['post_id'] = $post_id;
                    $category_data['category_id'] = $request->category_id[$j];
                    $post_category->fill($category_data);
                    $post_category->save();
                    $j++;
                }
            }
            $request->session()->flash('success','Post updated successfully.');
        } else {
            $request->session()->flash('error','Problem while updating post.');
        }
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->post = $this->post->find($id);
        if(!$this->post){
            request()->session()->flash('error','Article Not found');
            return redirect()->route('posts.index');
        }

        $success = $this->post->delete();
        if($success){
            request()->session()->flash('success','Post deleted successfully.');
        } else {
            request()->session()->flash('error','Sorry! Post could not be deleted at this moment.');
        }
        return redirect()->route('posts.index');
    }


}
