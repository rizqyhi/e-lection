<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', VoteController::class);

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

// Dashboard routes
Route::group([
    'prefix'     => 'dashboard',
    'namespace'  => 'Dashboard',
    'middleware' => 'auth'
], function () {
    Route::get('/', Home::class)->name('dashboard.home');

    Route::get('candidates', Candidates\ListCandidates::class)->name('dashboard.candidates');
    Route::post('candidates', Candidates\StoreCandidate::class);
    Route::get('candidates/create', Candidates\CreateCandidate::class)->name('dashboard.candidates.create');
    Route::get('candidates/{id}', Candidates\EditCandidate::class)->name('dashboard.candidates.edit');
    Route::put('candidates/{id}', Candidates\UpdateCandidate::class);
    Route::delete('candidates/{id}', Candidates\DeleteCandidate::class);

    Route::get('voters', Voters\ListVoters::class)->name('dashboard.voters');
    Route::get('voters/data', Voters\DatatablesHandler::class)->name('dashboard.voters.data');
    Route::post('voters', Voters\StoreVoter::class);
    Route::post('voters/import', Voters\ImportVoter::class)->name('dashboard.voters.import');
    Route::get('voters/import-template', Voters\ImportTemplate::class)->name('dashboard.voters.import-template');
    Route::get('voters/export', Voters\ExportVoter::class)->name('dashboard.voters.export');
    Route::get('voters/print', Voters\PrintVoters::class)->name('dashboard.voters.print');
});
