<?php

namespace App\Http\Controllers\Dashboard\Candidates;

use App\Repositories\Contracts\CandidateRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeleteCandidate extends Controller
{
    public function __invoke($candidateId, CandidateRepository $repository)
    {
        $candidate = $repository->find($candidateId);

        if (!$candidate) abort(404);

        if ($repository->delete($candidateId)) {
            return redirect()
                ->route('dashboard.candidates')
                ->with('success', 'Kandidat '.$candidate->name.' berhasil dihapus.');
        }

        return redirect()
            ->route('dashboard.candidates')
            ->with('failed', 'Terjadi kesalahan saat menghapus kandidat');
    }
}
