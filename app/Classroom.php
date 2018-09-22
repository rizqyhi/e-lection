<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $fillable = ['name'];

    public function voters()
    {
        return $this->hasMany(Voter::class);
    }
}
