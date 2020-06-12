<?php

use App\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DestinationController;
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

Route::get('/', function()
{
    return view('home');
});

Route::get('/destinations', function()
{
    $username = Auth::user()->name;
    $user_id = Auth::user()->id;
    $destinations = Destination::all()->where('user_id', $user_id);
    // Get average of lat and lng fields in destinations to center the map
    $center_lat = $destinations->average('lat');
    $center_lng = $destinations->average('lng');
    return view('destinations', [
        'username' => $username,
        'destinations' => $destinations,
        'center_lat' => $center_lat,
        'center_lng' => $center_lng
    ]);
})->middleware('auth');

Route::get('/destinations/create', function (Request $request)
{
    $user_id = Auth::user()->id;
    $username = Auth::user()->name;
    Destination::create([
        'name' => $request->name,
        'visited' => false,
        'user_id' => $user_id,
        'lat' => $request->lat,
        'lng' => $request->lng,
    ]);

    $destinations = Destination::all()->where('user_id', $user_id);
    // Get average of lat and lng fields in destinations to center the map
    $center_lat = $destinations->average('lat');
    $center_lng = $destinations->average('lng');

    return view('destinations', [
        'username' => $username,
        'destinations' => $destinations,
        'center_lat' => $center_lat,
        'center_lng' => $center_lng
    ]);
})->middleware('auth');


Route::delete('/destinations/{id}', function($id)
{
    $username = Auth::user()->name;
    $user_id = Auth::user()->id;
    $destination = Destination::find($id);
    $destination->delete();

    $destinations = Destination::all()->where('user_id', $user_id);
    $center_lat = $destinations->average('lat');
    $center_lng = $destinations->average('lng');
    return view('destinations', [
        'username' => $username,
        'destinations' => $destinations,
        'center_lat' => $center_lat,
        'center_lng' => $center_lng
    ]);
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
