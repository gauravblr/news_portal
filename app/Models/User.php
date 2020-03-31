<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['name', 'email', 'contact', 'password', 'image', 'role'];

    public function getRules($act = 'add'){
        $rules = [
            'name' => 'required|string|unique:users,name',
            'email' => 'required|string',
            'contact' => 'required|string',
            'password' => 'sometimes|string',
            'role' => 'required|in:admin,editor',
            'image' => 'required|string'
        ];
        if ($act !== 'add'){
            $rules['name'] = 'required|string';
        }
        return $rules;
    }
}
