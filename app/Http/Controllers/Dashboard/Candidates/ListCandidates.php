<?php

namespace App\Http\Controllers\Dashboard\Candidates;

use App\Repositories\Contracts\CandidateRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListCandidates extends Controller
{
    /**
     * method for get all candidates using repository
     * 
     * @param CandidateRepository
     * @return view
     */
    public function __invoke(CandidateRepository $repository)
    {
        return view('dashboard.candidates.index', [
            'candidates' => $repository->getAll()
        ]);
    }
}
