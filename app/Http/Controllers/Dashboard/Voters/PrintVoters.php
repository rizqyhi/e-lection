<?php

namespace App\Http\Controllers\Dashboard\Voters;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Classroom;

class PrintVoters extends Controller
{
    public function __invoke()
    {
        $classrooms = Classroom::with('voters')->get();

        return view('dashboard.voters.print', compact('classrooms'));
    }
}
