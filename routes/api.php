<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// il namespace si usa per raggruppare le rotte sooto il prefisso Api\
Route::namespace('Api')->group(function (){
    Route::get('/movies', 'MovieController@index');
    Route::get('/movies/{movie}', 'MovieController@show');
});
