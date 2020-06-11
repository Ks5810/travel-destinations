<?php

namespace App\Http\Controllers;

use App\Destination;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index()
    {
        $destinations = Destination::with('user')->get()->all();

        foreach ($destinations as $destination) {
            echo $destination->id;
            echo $destination->name;
        }

        return response()->json($destinations);
    }

    public function show($id)
    {
        $destination = Destination::all()->find($id);
        return response()->json($destination);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:100'],
            'visited' => ['required'],
            'user_id' => ['required']
        ]);
        $destination = Destination::create([
            'name' => $request->name,
            'visited' => $request->visited,
            'user_id' => $request->user_id
        ]);

        return response()->json($destination);
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:100'],
            'visited' => ['required'],
        ]);
        $target = Destination::where('id', $id)->update([
            'name' => $request->name,
            'visited'=> $request->visited
        ]);
        return response()->json($target);
    }

    public function delete(Request $request, $id)
    {
        $destination = Destination::find($id);
        $destination->delete();

        return 204;
    }
}
