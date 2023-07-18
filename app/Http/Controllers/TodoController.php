<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('home', compact('todos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'todo' => 'required',
        ]);

        $todo = new Todo();
        $todo->todo = $request->todo;
        $todo->save();
        return Response::json($todo);
    }

    public function update(Todo $todo, Request $request)
    {
        $request->validate([
            'todo' => 'required'
        ]);

        $todo->todo = $request->todo;
        $todo->save();
        return Response::json($todo);
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return Response::json($todo);
    }
}
