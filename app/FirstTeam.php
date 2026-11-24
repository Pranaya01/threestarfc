<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FirstTeam extends Model
{
    protected $table = 'firstteam';
    protected $fillable = [
        'fullname',
        'position',
        'address',
        'country',
        'date_of_birth',
        'gender',
        'height',
        'weight',
        'prefered_foot',
        'jersey_no',
        'image'
    ];
    public function player_position(){
        return $this->hasOne('App\Value', 'id', 'position');
    }
}
