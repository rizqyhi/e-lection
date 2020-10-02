<?php

namespace App\Http\Controllers;

use App\Candidate;

class VoteController extends Controller
{
    /**
     * 
     * method for get all candidate
     * 
     * @return view
     */
    public function __invoke()
    {
        $candidates = Candidate::all();

        return view('vote', compact('candidates'));
    }
}
