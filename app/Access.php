<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
    public $table = 'accesses';
    //
    protected $fillable = [
        'name',
        'email',
        'pin',
    ];
}
