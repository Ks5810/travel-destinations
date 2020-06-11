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
    $items = Destination::all()->where('user_id', $user_id);
    return view('destinations', [
        'name' => $username,
        'items' => $items
    ]);
})->middleware('auth');

Route::get('/destinations/create', function (Request $request)
{
    $user_id = Auth::user()->id;
    $username = Auth::user()->name;
    Destination::create([
        'name' => $request->name,
        'visited' => false,
        'user_id' => $user_id
    ]);

    $new_destinations = Destination::all()->where('user_id', $user_id);
    return view('destinations', [
        'name' => $username,
        'items' => $new_destinations
    ]);
})->middleware('auth');


Route::delete('/destinations/{id}', function($id)
{
    $username = Auth::user()->name;
    $user_id = Auth::user()->id;
    $destination = Destination::find($id);
    $destination->delete();

    $new_destinations = Destination::all()->where('user_id', $user_id);
    return view('destinations', [
        'name' => $username,
        'items' => $new_destinations
    ]);
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
