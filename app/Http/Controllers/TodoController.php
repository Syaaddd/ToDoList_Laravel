<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;


class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all(); // Fetch all todos
        return view('todos.index', compact('todos'));
    }


    public function create()
    {
        return view('todos.create');
    }
    public function store(TodoRequest $request)
    {
        // $request->validate();
        Todo::create([
            'title' => $request->title,
            'description' => $request->description,
            'is_completed' => false,
        ]);

        $request->session()->flash('alert-success', 'ToDoList Created Successfully');

        return to_route('todos.index');

    }

    public function show($id)
    {
        $todo = Todo::find($id);
        if(! $todo){
            request()->session()->flash('error', 'Unable to locate the ToDoList');
            return to_route('todos.index')->withErrors([
                'error' => 'Unable to locate the ToDoList'
            ]);
        }
        return view('todos.show', ['todo' => $todo]);
    }

    public function edit($id)
    {
        $todo = Todo::find($id);
        if(! $todo){
            request()->session()->flash('error', 'Unable to locate the ToDoList');
            return to_route('todos.index')->withErrors([
                'error' => 'Unable to locate the ToDoList'
            ]);
        }
        return view('todos.edit', ['todo' => $todo]);
    }

    public function update(TodoRequest $request)
    {
        $todo = Todo::find($request->todo_id);
        if(! $todo){
            request()->session()->flash('error', 'Unable to locate the ToDoList');
            return to_route('todos.index')->withErrors([
                'error' => 'Unable to locate the ToDoList'
            ]);
        }

        $todo->update([
            'title' => $request->title,
            'description' => $request->description,
            'is_completed' => $request->is_completed,
        ]);
        return redirect()->route('todos.index')->with('success', 'ToDoList updated successfully!');
    }

    public function destroy(Request $request)
    {
        $todo = Todo::find($request->todo_id);
        if(! $todo){
            request()->session()->flash('error', 'Unable to locate the Todo');
            return to_route('todos.index')->withErrors([
                'error' => 'Unable to locate the ToDoList'
            ]);
        }

        $todo->delete();
        $request->session()->flash('alert-success', 'ToDoList Delete Successfully');

        return to_route('todos.index');
    }
}
