<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['slug', 'user_id', 'address', 'DOB', 'salary', 'status'];

    public function getRules($act = 'add'){
        $rules = [
            'slug' => 'required|string|unique:employees,slug',
            'user_id' => 'required|exists:users,id',
            'salary' => 'required|string',
            'address' => 'required|string',
            'DOB' => 'required|string',
            'status' => 'required|in:active,suspended'
        ];
        if ($act !== 'add'){
            $rules['slug'] = 'required|string';
        }
        return $rules;
    }
}
