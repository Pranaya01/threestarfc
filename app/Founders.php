<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Founders extends Model
{
    protected $table = 'founders';
    protected $fillable = [
       'name',
       'position',
       'image'
    ];
}
