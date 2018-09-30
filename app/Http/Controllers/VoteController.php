<?php

namespace App\Http\Controllers;

use App\Candidate;

class VoteController extends Controller
{
    public function __invoke()
    {
        $candidates = Candidate::all();

        return view('vote', compact('candidates'));
    }
}
