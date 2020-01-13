<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    public function user_login()
    {
        return $this->belongsTo(UserLogin::class);
    }
}
