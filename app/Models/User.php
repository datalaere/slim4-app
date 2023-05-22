<?php

namespace App\Models;

use App\Models\Model;

class User extends Model
{

    //public $timestaps = [];

    protected $fillable = [
        'username',
        'password',
        'email'
    ];
}