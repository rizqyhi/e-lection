<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Candidate;
use App\Classroom;
use App\Voter;

class Home extends Controller
{
    /**
     * method for data all
     * 
     * @return view
     */
    public function __invoke()
    {
        /**
         * get stats by counting candidates,classrooms and voters
         */
        $stats = [
            'candidates' => Candidate::count(),
            'classrooms' => Classroom::count(),
            'voters' => Voter::count()
        ];

        /**
         * separate who already vote and who don't
         */
        $voters = [
            'voted' => Voter::has('vote')->count(),
            'unvoted' => Voter::doesntHave('vote')->count()
        ];

        /**
         * count candidate's vote
         */
        $candidates = Candidate::withCount('votes')->get();

        return view('dashboard.home', compact('stats', 'voters', 'candidates'));
    }
}
