<?php

namespace App\Http\Controllers\Dashboard\Voters;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Voter;

class DatatablesHandler extends Controller
{
    /**
     * method for get list of voter
     * 
     * @return datatables
     */
    public function __invoke()
    {
        /**
         * select table voter  with eager loading
         */
        $voters = Voter::with('classroom')
            ->select(['voters.*'])
            ->orderBy('classroom_id')
            ->orderBy('name');

        /**
         * change format of column access_code to code based tag
         */
        return datatables()->of($voters)
            ->editColumn('access_code', '<code>{{$access_code}}</code>')
            ->addColumn('action', function ($voter) {
                return '';
            })
            ->rawColumns(['access_code', 'action'])
            ->toJson();
    }
}
