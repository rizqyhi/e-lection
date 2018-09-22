<?php

namespace App\Http\Controllers\Dashboard\Voters;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListVoters extends Controller
{
    public function __invoke()
    {
        return view('dashboard.voters.index');
    }
}
