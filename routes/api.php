<?php

use App\Destination;
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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('destinations', 'DestinationController@index');
Route::get('destinations/{id}', 'DestinationController@show');
Route::post('destinations', 'DestinationController@store');
Route::put('destinations/{id}', 'DestinationController@update');
Route::delete('destinations/{id}', 'DestinationController@delete');