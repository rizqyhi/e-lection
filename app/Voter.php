<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voter extends Model
{
    public $incrementing = false;

    protected $fillable = ['classroom_id', 'name', 'access_code'];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
}
