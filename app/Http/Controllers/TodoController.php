<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate(['title' => 'required']);

        $todo = todo::create([
            'title' => $validatedData['title'],
            'todos_id' => $request->todos_id,
        ]);

        return $todo->toJson();
    }

    public function markAsCompleted(Todo $todo)
    {
        $todo->is_completed = true;
        $todo->update();

        return response()->json('Todo updated!');
    }
}

