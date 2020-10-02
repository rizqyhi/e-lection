<?php

namespace App\Http\Controllers\Dashboard\Voters;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Classroom;
use App\Voter;

class ListVoters extends Controller
{
    /**
     * method for get list of voter with clasroom
     * 
     * @return view
     */
    public function __invoke()
    {
        $voters = Voter::with('classroom')->get();
        $classrooms = Classroom::all();

        return view('dashboard.voters.index', compact('voters', 'classrooms'));
    }
}
