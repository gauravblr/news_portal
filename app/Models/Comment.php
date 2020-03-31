<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['name', 'email', 'comment', 'status', 'post_id'];

    public function getRules(){
        $rules = [
          'name' => 'required|string',
          'email' => 'required|string',
          'comment' => 'required|string',
          'post_id' => 'required|numeric',
          'status' => 'nullable|in:approve,unapprove'
        ];
        return $rules;
    }

    public function Post(){
      return $this->belongsTo('App\Models\Post');
    }
}
