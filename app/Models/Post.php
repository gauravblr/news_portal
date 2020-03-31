<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PostCategory;
use App\Models\Post;

class Post extends Model
{
    protected $fillable = ['title', 'slug', 'description', 'image', 'image_caption', 'caption_link', 'excerpt', 'status', 'language', 'is_featured', 'author_id'];

    public function getRules($act = 'add'){
        $rules = [
            'title' => 'required|string|unique:posts,title',
            'slug' => 'required|string|unique:posts,slug',
            'excerpt' => 'required|string',
            'language' => 'required|numeric',
            'is_featured' => 'nullable|numeric',
            'description' => 'required|string',
            'author_id' => 'nullable|numeric|exists:users,id',
            'status' => 'required|in:draft,publish',
            'image' => 'required|string',
            'image_caption' => 'nullable|string',
            'caption_link' => 'nullable|string'
        ];
        if ($act !== 'add'){
            $rules['title'] = 'required|string';
            $rules['slug'] = 'required|string';
        }
        return $rules;
    }

    public function categories(){
      return $this->belongsToMany(Category::class,'post_categories','post_id','category_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function writer()
    {
        return $this->belongsTo('App\Models\User', 'author_id');
    }

    public function getPostComment(){
      $posts = Post::whereHas('comments', function($query) {
          $query->where('staus', 'approve');
      });
    }

    public function getPostBySlug($slug){
      return Post::where('slug', $slug)->has('categories')
        ->with(['categories' => function($q) {
           $q->latest();
        }])->first();
    }

}
