<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voter extends Model
{
    /**
     * disable auto_increment
     */
    public $incrementing = false;

    /**
     * column that only able to fill
     */
    protected $fillable = ['id', 'classroom_id', 'name', 'access_code'];

    /**
     * define one to one relationship with classroom (constraint)
     */
    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    /**
     * define one to one relationship with vote (parent)
     */
    public function vote()
    {
        return $this->hasOne(Vote::class);
    }

    /**
     * method for save a vote for voter
     * 
     * @param Candidate
     * @return void
     */
    public function voteFor(Candidate $candidate)
    {
        $vote = new Vote(['candidate_id' => $candidate->id]);

        return $this->vote()->save($vote);
    }
}
