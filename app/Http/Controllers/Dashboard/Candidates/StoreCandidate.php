<?php

namespace App\Http\Controllers\Dashboard\Candidates;

use App\Http\Requests\CandidateStoreRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\CandidateRepository;

class StoreCandidate extends Controller
{
    private $repository;

    /**
     * constructor for redefining repository
     * 
     * @param CandidateRepository
     * @return void
     */
    public function __construct(CandidateRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * method for store candidate with custom field only
     * 
     * @param CandidateStoreRequest
     * @return redirect
     */
    public function __invoke(CandidateStoreRequest $request) {
        if ($candidate = $this->repository->save($request->only(['name', 'no', 'color']))) {
            $this->uploadPhoto($candidate, $request->file('photo'));
        }

        return redirect()
            ->route('dashboard.candidates')
            ->with('success', 'Kandidat baru berhasil disimpan');
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
