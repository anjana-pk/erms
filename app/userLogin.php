<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userLogin extends Model
{
    protected $table = 'user';
    protected $fillable = ['fname','lname','address','phone','email','password','status'];
}
