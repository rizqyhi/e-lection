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
            ->addColumn('action', function ($voter) {
                /* return '
                <div class="voter-row-action">
                    <a href="#" class="px-1 mr-2 btn-edit-voter" data-toggle="modal" data-target="#edit-voter-modal" data-voter=\''.$voter->toJson().'\'><i class="ion-md-create"></i></a>
                    <a href="" class="text-danger px-1"><i class="ion-md-trash"></i></a>
                </div>
                '; */
                return '';
            })
            ->rawColumns(['access_code', 'action'])
            ->toJson();
    }
}
