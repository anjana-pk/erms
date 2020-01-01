<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class machineCategory extends Model
{
    protected $table = 'machine_category';
    protected $fillable = ['categoryId','categoryName','userID'];
}
