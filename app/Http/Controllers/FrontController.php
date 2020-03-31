<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Service\Trending;
use Analytics;
use Spatie\Analytics\Period;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    protected $post = null;
    protected $category = null;
    protected $user = null;
    protected $comments = null;

    public function __construct(Post $post,Category $category,User $user, Comment $comments)
    {
        $this->post = $post;
        $this->category = $category;
        $this->user = $user;
        $this->comments = $comments;
    }

    public function homepage(){
            date_default_timezone_set('Asia/Kathmandu');
            $date = date('h:i:s a', time());

            $time = date("H");

            $timezone = date("e");

            if ($time < "10") {
                /*1400 hours morning*/
                $API_key    = 'AIzaSyCRbyueO6tm9RQ9jKoY6HGM8UqklE3qqiA';
            } elseif ($time >= "10" && $time < "15") {
                /*1900 hours afternoon*/
                $API_key    = 'AIzaSyBkamJahT-K5RBGwSY1SNyd2H1QX4_R0eM';
            } elseif ($time >= "15" && $time < "24"){
                $API_key    = 'AIzaSyCS0uejbOcE9Jws1a0JVie4vwtGSO0gcko';
            }
            $channelID  = 'UC0jbOHYoV1kXASuTmIeh8_g';
            $maxResults = 4;
            $youtube = 'https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId='.$channelID.'&maxResults='.$maxResults.'&key='.$API_key;
            $curl = curl_init($youtube);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $return = curl_exec($curl);
            curl_close($curl);
            $youtube = json_decode($return, true);
            $trending = app('App\Services\Trending')->getResults(7, 20);
            $news= array();
            foreach($trending as $key => $trends){
              $slug = str_replace('/', '', $trends['url']);
              $news[$key] = $this->post->getPostBySlug($slug);
            }
            $trending_news = array_values(array_filter($news));
            $latest = $this->post->orderBy('created_at', 'desc')->take(6)->get();
            $hollywood = Category::getPostByCategory(13, 6);
            $bollywood = Category::getPostByCategory(14, 6);
            $tollywood = Category::getPostByCategory(15, 6);
            $kollywood = Category::getPostByCategory(16, 6);
            $fashion = Category::getPostByCategory(17, 6);
            $music = Category::getPostByCategory(18, 6);
            $music = Category::getPostByCategory(19, 6);
        return view('frontend.pages.index', compact('youtube', 'channelID','hollywood', 'bollywood', 'kollywood', 'tollywood', 'latest','trending_news'));
    }

    public function singlePost($slug){
        $data = $this->post->with('categories')->where('slug',$slug)->first();
        $postComment = $this->comments->where('post_id', $data->id)->where('status', 'approve')->get();
        if(!$data) {
            request()->session()->flash('error','Post not found');
            return redirect()->back();
        }
        $related = Post::whereHas('categories', function ($q) use ($data) {
            return $q->whereIn('name', $data->categories->pluck('name'));
        })
        ->where('id', '!=', $data->id)
        ->take(2)
        ->get();
        if($data->categories[0]->slug == 'photo-in-depth'){
          return view('frontend.pages.photo-in-depth', compact('data', 'related','postComment'));
        } else {
          return view('frontend.pages.single', compact('data', 'related','postComment'));
        }
    }

    public function category($slug){
        $data = $this->category->with('posts')->where('slug',$slug)->first();
        $paginate = $data->posts()->paginate(10);
        return view('frontend.pages.category', compact('data', 'paginate'));
    }

    public function writer($slug){
        $writer_detail = $this->user->where('slug', $slug)->first();
        $data = $this->post->where('author_id', $writer_detail->id)->where('status', 'publish')->orderBy('created_at', 'desc')->paginate(10);
        return view('frontend.pages.author', compact('data', 'writer_detail'));
    }

    public function search(Request $request){
        $posts = Post::query();
        $word = trim($request->keyword);
        if($word && !empty($word)){
               $posts->where('title', 'LIKE', '%' . $word . '%')
                ->orWhere('excerpt', 'LIKE', '%' . $word . '%')
                ->orWhere('description', 'LIKE', '%' . $word . '%');
        }
        $data = $posts->paginate(10);
        return view('frontend.pages.search', compact('data', 'word'));
    }

}
