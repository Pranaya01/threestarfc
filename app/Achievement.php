<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    protected $table = 'achievement';
    protected $fillable = [
        'tournament_id',
        'achievement_type',
        'position',
        'season'
    ];
    public function tournament_details(){
        return $this->hasOne('App\Tournament', 'id', 'tournament_id');
    }
    public function achievement_details(){
        return $this->hasOne('App\Value', 'id', 'achievement_type');
}
}
