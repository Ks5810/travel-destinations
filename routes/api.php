<?php

use Illuminate\Support\Facades\Route;

Route::get('logout', 'AuthController@logout');
Route::post('register', 'AuthController@register');
Route::post('login', 'Auth\AuthController@login');

Route::get('api/user', function () {
    Route::get('destinations', 'DestinationController@index');
    Route::get('destinations/{id}', 'DestinationController@show');
    Route::post('destinations', 'DestinationController@store');
    Route::put('destinations/{id}', 'DestinationController@update');
    Route::delete('destinations/{id}', 'DestinationController@delete');
})->middleware('auth.basic.once');

// Auth
//Route::group([
//    'prefix' => 'auth'
//], function () {
//    Route::post('/register', 'AuthController@register');
//    Route::post('/login', 'Auth\AuthController@login');
//    Route::middleware(['auth:sanctum'])->group( function ()
//    {
//        Route::get('/users', 'UserController@index');
//        //Authenticated routes
//        Route::get('logout', 'AuthController@logout');
//        Route::get('user', 'AuthController@user');
//        Route::get('destinations', 'DestinationController@index');
//        Route::get('destinations/{id}', 'DestinationController@show');
//        Route::post('destinations', 'DestinationController@store');
//        Route::put('destinations/{id}', 'DestinationController@update');
//        Route::delete('destinations/{id}', 'DestinationController@delete');
//    });

