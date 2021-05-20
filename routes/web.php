<?php

use Illuminate\Support\Facades\Route;

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
// con questa Route reindirizzo direttamente la pagina da me desiderata
Route::get('/', function () {
    return redirect()->route('movies.index');
});

Route::get('/w', function () {
    return view('welcome');
});

Route::resource('movies', 'MovieController');
