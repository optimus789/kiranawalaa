<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    protected $table = 'items';
    protected $fillable = ['title','desc','category','cprice','sprice','mrp','tax','stock','units'];
}
// comment 2