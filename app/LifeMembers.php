<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LifeMembers extends Model
{
    protected $table = 'lifemembers';
    protected $fillable = [
        'name',
        // 'designation',
        // 'profession',
        // 'contact_no',
        // 'address',
        // 'contribution',
        // 'image'
    ];
}
