<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Candidate;
use App\Classroom;
use App\Voter;

class Home extends Controller
{
    public function __invoke()
    {
        $stats = [
            'candidates' => Candidate::count(),
            'classrooms' => Classroom::count(),
            'voters' => Voter::count()
        ];

        $voters = [
            'voted' => Voter::has('vote')->count(),
            'unvoted' => Voter::doesntHave('vote')->count()
        ];

        $candidates = Candidate::withCount('votes')->get();

        return view('dashboard.home', compact('stats', 'voters', 'candidates'));
    }
}
