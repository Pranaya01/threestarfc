<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fixtures extends Model
{
    protected $table = 'fixtures';
    protected $fillable = [
        'tournament_id',
        'club_1',
        'club_2',
        'date',
        'venue',
        'club1_score',
        'club2_score',
        'club1_result',
        'club2_result',
        'match_status'
    ];
    public function tournamentName(){
        return $this->hasOne('App\Tournament', 'id', 'tournament_id');
    }
    public function venueDetail(){
        return $this->hasOne('App\Value', 'id', 'venue');
    }
}
