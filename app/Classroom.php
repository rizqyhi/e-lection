<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    /**
     * column that only able to fill
     */
    protected $fillable = ['name'];

    /**
     * one to many relationship
     */
    public function voters()
    {
        return $this->hasMany(Voter::class);
    }
}
