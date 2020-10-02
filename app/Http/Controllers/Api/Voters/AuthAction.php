<?php

namespace App\Http\Controllers\Api\Voters;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\VoterAuthRequest;
use App\Voter;

class AuthAction extends Controller
{
    public function __invoke(VoterAuthRequest $request)
    {
        /**
         * select voter then validate their access code
         * 
         * @param VoterAuthRequest
         * @return json 
         */
        $voter = Voter::where('id', $request->id)
            ->where('access_code', $request->access_code)
            ->first();

        if (!$voter) {
            return response()->json(['message' => 'NIS dan kode akses tidak cocok'], 404);
        }

        if ($voter->vote) {
            return response()->json(['message' => 'Kamu sudah menggunakan hak pilihmu'], 401);
        }

        return response()->json($voter);
    }
}
