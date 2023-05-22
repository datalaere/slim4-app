<?php

namespace App\Models;

use App\Models\Model;

class Auth extends Model
{

    //public $timestaps = [];

    protected $fillable = [
        'username',
        'password',
        'email'
    ];

    public static function isAdmin()
    {
        
    }
}