<?php

namespace App\Http\Controllers\Dashboard\Voters;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Voter;

class DatatablesHandler extends Controller
{
    public function __invoke()
    {
        $voters = Voter::with('classroom')->select(['voters.*']);

        return datatables()->of($voters)
            ->editColumn('access_code', '<code>{{$access_code}}</code>')
            ->rawColumns(['access_code'])
            ->toJson();
    }
}
