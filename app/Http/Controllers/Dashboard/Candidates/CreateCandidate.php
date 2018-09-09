<?php

namespace App\Http\Controllers\Dashboard\Candidates;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreateCandidate extends Controller
{
    public function __invoke()
    {
        return view('dashboard.candidates.create');
    }
}
