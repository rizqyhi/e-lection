<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    /**
     * define primary key
     */
    public $primary = 'voter_id';

    /**
     * disable auto_increment
     */
    public $incrementing = false;

    /**
     * column that only able to fill
     */
    protected $fillable = ['voter_id', 'candidate_id'];
}
