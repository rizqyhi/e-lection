<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function __invoke()
    {
        return view('vote');
    }
}
