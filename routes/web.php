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

Route::get('/', function () {
    return view('welcome');
});

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
    Route::get('/', Home::class);

    Route::get('candidates', Candidates\ListCandidates::class)->name('dashboard.candidates');
    Route::post('candidates', Candidates\StoreCandidate::class);
    Route::get('candidates/create', Candidates\CreateCandidate::class)->name('dashboard.candidates.create');
    Route::get('candidates/{id}', Candidates\EditCandidate::class)->name('dashboard.candidates.edit');
    Route::put('candidates/{id}', Candidates\UpdateCandidate::class);
    Route::delete('candidates/{id}', Candidates\DeleteCandidate::class);

    Route::get('voters', Voters\ListVoters::class)->name('dashboard.voters');
});
