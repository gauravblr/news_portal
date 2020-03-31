<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Category;

class Category extends Model
{
    protected $fillable = ['name','slug','is_parent','parent', 'priority'];

    public function getRules(){
        $rules = [
            'name' => 'bail|required|string|unique:categories,name',
            'slug' => 'bail|required|string|unique:categories,slug',
            'is_parent' => 'sometimes|numeric',
            'priority' => 'required|numeric',
            'parent' => 'nullable|exists:categories,id'
        ];
        if($rules != 'add'){
            $rules['name'] = "required|string";
            $rules['slug'] = "required|string";
        }
        return $rules;
    }

    public function category(){
        return $this->belongsTo('App\Models\Category', 'parent');
    }

    public function posts(){
        return $this->belongsToMany(Post::class,'post_categories','category_id','post_id');
    }

    public static function getPostByCategory($id, $limit){
        return Category::where('id', $id)->has('posts')
          ->with(['posts' => function($q) use(&$limit) {
             $q->latest()->limit($limit);
          }])->first();
    }

}
