<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $fillable = ['facebook','twitter', 'linkedin', 'instagram', 'youtube',];

    public function getRules(){
        $rules = [
            'facebook' => 'required|string',
            'twitter' => 'required|string',
            'linkedin' => 'required|string',
            'instagram' => 'required|string',
            'youtube' => 'required|string'
        ];
        return $rules;
    }
}
