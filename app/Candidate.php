<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    /**
     * column that only able to fill
     */
    protected $fillable = [
        'id', 'name', 'no', 'color', 'photo'
    ];

    /**
     * can append photo
     */
    protected $appends = ['photo_url'];

    /**
     * no auto_increment
     */
    public $incrementing = false;

    /**
     * get url of photo
     */
    public function getPhotoUrlAttribute()
    {
        return asset('storage/candidates/'.$this->photo);
    }

    /**
     * one to many relationship
     */
    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
}
