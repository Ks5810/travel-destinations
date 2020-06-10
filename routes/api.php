<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('register', 'AuthController@register');
Route::post('login', 'Auth\AuthController@login');

// User authenticated routes
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return response()->json($request->user());
});

Route::middleware('auth:sanctum')
    ->get('/logout', 'AuthController@logout');

Route::middleware('auth:sanctum')
    ->get('/destinations', 'DestinationController@index');

Route::middleware('auth:sanctum')
    ->get('/destinations/{id}', 'DestinationController@show');


//Route::get('logout', 'AuthController@logout');
//Route::get('destinations', 'DestinationController@index');
//Route::get('destinations/{id}', 'DestinationController@show');
//Route::post('destinations', 'DestinationController@store');
//Route::put('destinations/{id}', 'DestinationController@update');
//Route::delete('destinations/{id}', 'DestinationController@delete');
