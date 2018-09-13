<?php

namespace App\Http\Controllers\Dashboard\Candidates;

use App\Http\Requests\CandidateUpdateRequest;
use App\Repositories\Contracts\CandidateRepository;
use App\Http\Controllers\Controller;

class UpdateCandidate extends Controller
{
    private $repository;

    public function __construct(CandidateRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke($candidateId, CandidateUpdateRequest $request)
    {
        $candidate = $this->repository->find($candidateId);

        if (!$candidate) abort(404);

        if (
            $this->repository->update($candidateId, $request->only(['name', 'no', 'color'])) &&
            $request->hasFile('photo')
        ) {
            $this->uploadPhoto($candidate, $request->file('photo'));
        }

        return redirect()
            ->route('dashboard.candidates')
            ->with('success', 'Data kandidat <strong>'.$candidate->name.'</strong> berhasil disimpan');
    }

    public function uploadPhoto($candidate, $file) {
        if ($file->isValid()) {
            $file->storeAs('candidates', $file->hashName(), 'public');

            $this->repository->update($candidate->id, ['photo' => $file->hashName()]);
        }
    }
}
