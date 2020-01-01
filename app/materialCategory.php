<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class materialCategory extends Model
{
   protected $table = 'material_category';
   protected $fillable = ['categoryId','categoryName','userID'];
}
