<?php

namespace App\Http\Controllers\Dashboard\Candidates;

use App\Repositories\Contracts\CandidateRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EditCandidate extends Controller
{
    public function __invoke($id, CandidateRepository $repository)
    {
        $candidate = $repository->find($id);

        return view('dashboard.candidates.edit', compact('candidate'));
    }
}
