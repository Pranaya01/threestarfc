<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Value extends Model
{
    protected $table = 'value';
    protected $fillable = ['category_id', 'value'];

    public function usertype(){
        return $this->hasMany('App\User');
    }
    public function bodposition(){
        return $this->hasMany('App\BoardDirectors');
    }
    public function player_position(){
        return $this->hasMany('App\FirstTeam');
    }
    public function staff_designation(){
        return $this->hasMany('App\Staff');
    }
    public function tournamentCategory(){
        return $this->hasMany('App\Tournament');
    }
    public function achievement_details(){
        return $this->hasMany('App\Achievement');
    }
    public function venueDetail(){
        return $this->hasMany('App\Fixtures');
    }
    // public function news_info(){
    //     return $this->hasMany('App\News');
    // }
    // public function club_division(){
    //     return $this->hasMany('App\Club');
    // }
  
    
    // public function club_name(){
    //     return $this->hasMany('App\RedCard');
    }
   

