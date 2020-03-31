<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{

    protected $comments = null;

    public function __construct(Comment $comments){
      $this->comments = $comments;
    }

    public function store(Request $request){
      $rules = $this->comments->getRules();
      $validator = Validator::make($request->all(), [
          'name' => 'bail|required|string',
          'email' => 'bail|required|string',
          'comment' => 'required|string',
          'post_id' => 'required|numeric'
      ]);
      if ($validator->fails()) {
          return response()->json(['error'=>$validator->getMessageBag()->toArray()], 422);
      }

      $data = $request->all();
      $data['name'] = $request->name;
      $data['email'] = $request->email;
      $data['comment'] = $request->comment;
      $data['post_id'] = $request->post_id;
      $this->comments->fill($data);
      $status = $this->comments->save();

      if($status){
          return response()->json(['status'=>true,'data'=>'You comment has been posted successfully. You should be able to see your comment once it is approved!']);
      } else {
          return response()->json(['status'=>false,'data'=>null]);
      }
    }

    public function approveComment(){
      $allComments = $this->comments->where('status', 'approve')->get();
      return view('admin.pages.comments', compact('allComments'));
    }
    public function unapproveComment(){
      $allComments = $this->comments->where('status', 'unapprove')->get();
      return view('admin.pages.comments', compact('allComments'));
    }
    public function edit($id){
      $data = $this->comments->find($id);
      if(!$data) {
          request()->session()->flash('error','Comment not found');
          return redirect()->back();
      }

      return view('admin.pages.edit_comment', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $this->comments = $this->comments->find($id);
        if(!$this->comments) {
            request()->session()->flash('error','Comment not found');
            return redirect()->back();
        }
        $rules = $this->comments->getRules('update');
        $request->validate($rules);
        $data = $request->all();
        $this->comments->fill($data);
        $success = $this->comments->save();
        if($success){
          $request->session()->flash('success','Comment updated successfully.');
            if($request->status == 'approve'){
                return redirect()->route('approve_comment');
            } else {
              return redirect()->route('unapprove_comment');
            }

        } else {
            $request->session()->flash('error','Problem while updating comment.');
            return redirect()->route('unapprove_comment');
        }

    }

    public function destroy($id){
      $this->comments = $this->comments->find($id);
      if(!$this->comments){
          request()->session()->flash('error','Comment Not found');
          return redirect()->route('unapprove_comment');
      }

      $success = $this->comments->delete();
      if($success){
          request()->session()->flash('success','Comment deleted successfully.');
      } else {
          request()->session()->flash('error','Sorry! Comment could not be deleted at this moment.');
      }
      return redirect()->route('unapprove_comment');
    }
}
