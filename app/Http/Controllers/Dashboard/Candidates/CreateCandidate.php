<?php

namespace App\Http\Controllers\Dashboard\Candidates;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreateCandidate extends Controller
{
    public function __invoke(Request $request) {
        $request->validate([
            'name'  => 'required',
            'no'    => 'required|integer',
            'color' => 'required'
        ]);

        return response('candidate created', 201);
    }
}
