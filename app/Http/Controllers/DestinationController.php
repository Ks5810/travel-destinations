<?php

namespace App\Http\Controllers;

use App\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function index()
    {
        return Destination::all();
    }

    public function show($id)
    {
        return Destination::find($id);
    }

    public function store(Request $request)
    {
        return Destination::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $article = Destination::findOrFail($id);
        $article->update($request->all());

        return $article;
    }

    public function delete(Request $request, $id)
    {
        $article = Destination::findOrFail($id);
        $article->delete();

        return 204;
    }
}