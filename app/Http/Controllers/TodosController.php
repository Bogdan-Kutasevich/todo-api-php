<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{

    public function index() {
        $todos = Todo::all();

        return response($todos, 200);
    }

    public function store(Request $request) {
        $todo = Todo::create([
            'title' => $request->title,
            'parentId' => $request->parentId,
        ]);

        $todo->save();


        return response($todo, 201);
    }


    public function update(Request $request, string $id) {
        $todo = Todo::find($id);
        $todo->title = $request->title;
        $todo->completed = $request->has('completed')
            ? $request->completed
            : $todo->completed;

        $todo->save();

        return response($todo, 200);
    }

    public function destroy(string $id) {
        Todo::destroy($id);

        return response(null, 204);
    }
}
