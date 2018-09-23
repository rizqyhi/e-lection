<?php

namespace App\Http\Controllers\Dashboard\Voters;

use App\Http\Controllers\Controller;
use App\Http\Requests\VoterStoreRequest;
use App\Voter;

class StoreVoter extends Controller
{
    public function __invoke(VoterStoreRequest $request)
    {
        $voter_data = $request->all();

        if (!$voter_data['access_code']) {
            $voter_data['access_code'] = str_random(5);
        }

        $voter = Voter::create($voter_data);

        return redirect()->back()
            ->with('success', sprintf(
                'Pemilih <strong>%s</strong> berhasil ditambahkan dengan kode akses <code>%s</code>',
                $voter->name,
                $voter->access_code
            ));
    }
}
