<?php

namespace App\Http\Controllers\Api\Voters;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\VoterVoteRequest;
use App\Candidate;
use App\Voter;

class VoteAction extends Controller
{
    /**
     * voter selecting candidate
     * 
     * @param VoterAuthRequest
     * @return json
     */
    public function __invoke(VoterVoteRequest $request)
    {
        try {
            $voter = Voter::find($request->voter_id);
            $candidate = Candidate::find($request->candidate_id);

            $voter->voteFor($candidate);
        } catch (\Exception $e) {
            return response()->json($e, 500);
        }

        return response()->json(['message' => 'Pilihan berhasil disimpan']);
    }
}
