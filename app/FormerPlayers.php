<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormerPlayers extends Model
{
    protected $table = 'formerplayers';
    protected $fillable = [
       'name',
       'address'
    ];
}
