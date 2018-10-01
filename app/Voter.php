<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voter extends Model
{
    public $incrementing = false;

    protected $fillable = ['id', 'classroom_id', 'name', 'access_code'];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function vote()
    {
        return $this->hasOne(Vote::class);
    }

    public function voteFor(Candidate $candidate)
    {
        $vote = new Vote(['candidate_id' => $candidate->id]);

        return $this->vote()->save($vote);
    }
}
