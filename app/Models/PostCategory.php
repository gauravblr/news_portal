<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \App\Models\Post;
use \App\Models\PostCategory;

class PostCategory extends Model
{
    protected $fillable = ['post_id', 'category_id'];

    public function category()
    {
        return $this->belongsTo('App\Models\PostCategory', 'category_id');
    }

    public function post(){
      return $this->belongsToMany('App\Models\Post');
    }

}
