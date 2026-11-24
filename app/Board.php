<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    protected $table = 'board';
    protected $fillable = [
        'name',
        'designation',
        'profession',
        'contact_no',
        'address',
        'contribution',
        'image'
    ];
    public function bodposition(){
        return $this->hasOne('App\Value', 'id', 'designation');
    }
}
