<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inv extends Model
{
    protected $table = 'inv';
    protected $fillable = ['title','description','category','rate','image', 'tax', 'stock', 'units'];
}
