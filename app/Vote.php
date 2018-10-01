<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    public $primary = 'voter_id';

    public $incrementing = false;

    protected $fillable = ['voter_id', 'candidate_id'];
}
