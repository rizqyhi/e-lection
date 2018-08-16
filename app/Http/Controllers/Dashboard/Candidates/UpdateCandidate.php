<?php

namespace App\Http\Controllers\Dashboard\Candidates;

use Illuminate\Http\Request;
use App\Candidate;
use App\Http\Controllers\Controller;

class UpdateCandidate extends Controller
{
    public function __invoke(Candidate $candidate)
    {
        return response()->json($candidate, 201);
    }
}
