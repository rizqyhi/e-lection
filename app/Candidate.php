<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = [
        'id', 'name', 'no', 'color', 'photo'
    ];

    protected $appends = ['photo_url'];

    public $incrementing = false;

    public function getPhotoUrlAttribute()
    {
        return asset('storage/candidates/'.$this->photo);
    }
}
