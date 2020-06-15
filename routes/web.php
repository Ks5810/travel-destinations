<?php

use App\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DestinationController;
use Illuminate\Support\Facades\Validator;
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
    if(Auth::check())
    {
        return redirect('/destinations');
    }

    // Get popular places among users
    $destinations = Destination::where('user_id', 1)->get();

    // Get average of lat and lng fields in destinations to center the map
    $center_lat = $destinations->average('lat');
    $center_lng = $destinations->average('lng');

    return view('home', [
        'username' => 'Sample Destinations',
        'destinations' => $destinations,
        'center_lat' => $center_lat,
        'center_lng' => $center_lng
    ]);
})->name('home');

Route::get('/destinations', function()
{
    $username = Auth::user()->name;
    $user_id = Auth::user()->id;

    // Get matching Json data
    $destinations = Destination::where('user_id', $user_id)->get();

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

Route::post('/destinations', function (Request $request)
{

    $user_id = Auth::user()->id;
    $username = Auth::user()->name;

    $validator = Validator::make($request->all(), [
        'name' => ['required', 'max:100'],
        'lat' => ['required', 'numeric' ],
        'lng' => ['required', 'numeric']
    ]);

    // Validate coordinates
    $lat = $request->lat;
    $lng = $request->lng;
    $invalidLat = $lat > 90 || $lat < -90;
    $invalidLng = $lng > 180 || $lng < -180;

    if($invalidLat)
    {
        $validator->errors()
            ->add('lat', 'Invalid latitude value!');
    }
    if($invalidLng)
    {
        $validator->errors()
            ->add('lng', 'Invalid longitude value!');
    }

    if($invalidLat || $invalidLng || $validator->fails())
    {
        return Redirect::back()->withErrors($validator->errors());
    }

    Destination::create([
        'name' => $request->name,
        'visited' => false,
        'user_id' => $user_id,
        'lat' => $request->lat,
        'lng' => $request->lng,
    ]);

    return redirect('/destinations');
})->middleware('auth');


Route::delete('/destinations/{id}', function($id)
{
    $user_id = Auth::user()->id;
    $destination = Destination::find($id);
    $destination->delete();
    return redirect('/destinations');
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
