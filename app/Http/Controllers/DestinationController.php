<?php

namespace App\Http\Controllers;

use App\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate(['name' => 'required']);
        $destination = Destination::create([
            'name' => $validatedData['name'],
            'user_id' => $request->user_id,
        ]);

        return $destination->toJson();
    }
}