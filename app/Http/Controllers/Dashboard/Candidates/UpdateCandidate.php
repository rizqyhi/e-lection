<?php

namespace App\Http\Controllers\Dashboard\Candidates;

use App\Http\Requests\CandidateUpdateRequest;
use App\Repositories\Contracts\CandidateRepository;
use App\Http\Controllers\Controller;

class UpdateCandidate extends Controller
{
    private $repository;

    /**
     * contructor for redefining repository
     * 
     * @param CandidateRepository
     * @return void
     */
    public function __construct(CandidateRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * 
     * method for update candidate
     * 
     * @param int,CandidateUpdateRequest
     * @return redirect
     */
    public function __invoke($candidateId, CandidateUpdateRequest $request)
    {
        /**
         * find id in repository through eloquent
         */
        $candidate = $this->repository->find($candidateId);

        /**
         * if no matched candidate
         */
        if (!$candidate) abort(404);

        /**
         * if there is matched candidate
         */
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

    /**
     * method for upload photo
     * 
     * @param object,file
     * @return void
     */
    public function uploadPhoto($candidate, $file) {
        if ($file->isValid()) {
            $file->storeAs('candidates', $file->hashName(), 'public');

            $this->repository->update($candidate->id, ['photo' => $file->hashName()]);
        }
    }
}
