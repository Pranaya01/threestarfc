<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'staff';
    protected $fillable = [
        'name',
        'contact_no',
        'designation',
        'image'
    ];
    public function staff_position(){
        return $this->hasOne('App\Value', 'id', 'designation');
    }
}
