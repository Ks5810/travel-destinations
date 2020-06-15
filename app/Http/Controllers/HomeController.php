<?php

namespace App\Http\Controllers;

use App\Destination;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Get popular places among users
        $destinations = Destination::where('user_id', 1)->get();

        // Get average of lat and lng fields in destinations to center the map
        $center_lat = $destinations->average('lat');
        $center_lng = $destinations->average('lng');

        return view('home', [
            'user_name' => 'Sample Destinations',
            'destinations' => $destinations,
            'center_lat' => $center_lat,
            'center_lng' => $center_lng
        ]);
    }
}
