<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class machineCreate extends Model
{
    protected $table = 'machine';
    protected $fillable = ['make','category','model','vehicleID','rate','unit','image'];
}
