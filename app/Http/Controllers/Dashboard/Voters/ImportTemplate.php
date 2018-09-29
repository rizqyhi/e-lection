<?php

namespace App\Http\Controllers\Dashboard\Voters;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImportTemplate extends Controller
{
    public function __invoke()
    {
        return response()->download(storage_path('app/template-e-lection.xlsx'));
    }
}
