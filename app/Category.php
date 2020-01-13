<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['category_id', 'category_name', 'fk_created_user_id'];
}
