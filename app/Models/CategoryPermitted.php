<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryPermitted extends Model
{
    protected $fillable = ['id', 'user_id', 'category_id'];

    public function getRules(){
        $rules = [
            'user_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id'
        ];
        return $rules;
    }
}
