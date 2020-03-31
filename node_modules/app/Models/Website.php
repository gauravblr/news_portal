<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    protected $fillable = ['email','primary','secondary', 'location', 'logo'];

    public function getRules(){
        $rules = [
            'email' => 'nullable|string',
            'primary' => 'nullable|string',
            'secondary' => 'nullable|string',
            'location' => 'nullable|string',
            'logo' => 'nullable|string'
        ];
        return $rules;
    }
}
