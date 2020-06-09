<?php

use App\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Auth
Route::group([
    'prefix' => 'auth'
], static function () {
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');

    Route::group([
        'middleware' => 'auth:api'
    ], static function () {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});

// Destinations
Route::get('destinations', 'DestinationController@index');
Route::get('destinations/{id}', 'DestinationController@show');
Route::post('destinations', 'DestinationController@store');
Route::put('destinations/{id}', 'DestinationController@update');
Route::delete('destinations/{id}', 'DestinationController@delete');