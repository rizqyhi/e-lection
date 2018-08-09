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
            'color' => 'required',
            'photo' => 'required|image|max:1024'
        ]);

        if ($candidate = $repository->save($validatedData)) {
            $this->uploadPhoto($candidate, $validatedData['photo']);
        }

        return response('candidate created', 201);
    }

    public function uploadPhoto($candidate, $file) {
        if ($file->isValid()) {
            $file->storeAs('candidates', $file->hashName(), 'public');
        }
    }
}
