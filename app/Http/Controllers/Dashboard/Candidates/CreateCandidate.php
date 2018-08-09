<?php

namespace App\Http\Controllers\Dashboard\Candidates;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\CandidateRepository;

class CreateCandidate extends Controller
{
    public function __invoke(Request $request, CandidateRepository $repository) {
        $validatedData = $request->validate([
            'name'  => 'required',
            'no'    => 'required|integer',
            'color' => 'required'
        ]);

        $candidate = $repository->save($validatedData);

        return response('candidate created', 201);
    }
}
