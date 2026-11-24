<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    protected $table = 'tournament';
    protected $fillable = [
        'tournament_name',
        'tournament_type',
        'venue'
    ];
    public function tournamentCategory(){
        return $this->hasOne('App\Value', 'id', 'tournament_type');
    }
    public function tournament_details(){
        return $this->hasMany('App\Achievement');
    }
    public function tournamentName(){
        return $this->hasMany('App\Fixtures');
    }
}
