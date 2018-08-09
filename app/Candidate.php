<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = [
        'id', 'name', 'no', 'color', 'photo'
    ];

    public $incrementing = false;
}
