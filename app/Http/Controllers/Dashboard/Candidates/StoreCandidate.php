<?php

namespace App\Http\Controllers\Dashboard\Candidates;

use App\Http\Requests\CandidateStoreRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\CandidateRepository;

class StoreCandidate extends Controller
{
    private $repository;

    public function __construct(CandidateRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(CandidateStoreRequest $request) {
        if ($candidate = $this->repository->save($request->only(['name', 'no', 'color']))) {
            $this->uploadPhoto($candidate, $request->file('photo'));
        }

        return redirect()
            ->route('dashboard.candidates')
            ->with('sucess', 'Kandidat baru berhasil disimpan');
    }

    public function uploadPhoto($candidate, $file) {
        if ($file->isValid()) {
            $file->storeAs('candidates', $file->hashName(), 'public');

            $this->repository->update($candidate->id, ['photo' => $file->hashName()]);
        }
    }
}
