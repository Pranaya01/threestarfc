<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PastPresidents extends Model
{
    protected $table = 'pastpresidents';
    protected $fillable = [
        'name',
        'profession',
        'contact_no',
        'address',
        'term',
        'contribution',
        'image'
    ];
}
