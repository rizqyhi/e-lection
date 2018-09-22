<?php

namespace App\Http\Controllers\Dashboard\Voters;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Voter;

class ListVoters extends Controller
{
    public function __invoke()
    {
        $voters = Voter::with('classroom')->get();

        return view('dashboard.voters.index', compact('voters'));
    }
}
