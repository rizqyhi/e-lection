<?php

namespace App\Http\Controllers\Dashboard\Candidates;

use App\Repositories\Contracts\CandidateRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeleteCandidate extends Controller
{
    /**
     * method for delete candidate
     * 
     * @param int,CandidateRepository
     */
    public function __invoke($candidateId, CandidateRepository $repository)
    {
        $candidate = $repository->find($candidateId);

        /**
         * if there is no matched candidate
         */
        if (!$candidate) abort(404);

        /**
         * if there is matched candidate
         */
        if ($repository->delete($candidateId)) {
            return redirect()
                ->route('dashboard.candidates')
                ->with('success', 'Kandidat '.$candidate->name.' berhasil dihapus.');
        }

        /**
         * if none of above is true
         */
        return redirect()
            ->route('dashboard.candidates')
            ->with('failed', 'Terjadi kesalahan saat menghapus kandidat');
    }
}
