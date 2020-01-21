<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Todo::orderBy('created_at', 'desc')->paginate(8);
        return view('todos.index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation rules
        $rules = [
            'title' => 'required|string|unique:todos,title|min:2|max:191',
            'body' => 'required|string|min:5|max:1000'
        ];

        // Custom validation error messages
        $messages = [
            'title.unique' => 'Todo Title should be unique'
        ];

        $request->validate($rules, $messages);

        $todo = new Todo;
        $todo->title = $request->title;
        $todo->body = $request->body;
        // save it to database
        $todo->save();

        // redirect user to the index page
        return redirect()
            ->route('todos.index')
            ->with('status', 'Created a new Todo!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todo = Todo::findOrFail($id);
        return view('todos.show', compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = Todo::findOrFail($id);
        return view('todos.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validation rules
        $rules = [
            'title' => "required|string|unique:todos,title,{$id}|min:2|max:191",
            'body' => 'required|string|min:5|max:1000'
        ];

        // Custom validation error messages
        $messages = [
            'title.unique' => 'Todo Title should be unique'
        ];

        $request->validate($rules, $messages);

        $todo = Todo::findOrFail($id);
        $todo->title = $request->title;
        $todo->body = $request->body;
        // save it to database
        $todo->save();

        // redirect to specified route with a flash message
        return redirect()
            ->route('todos.show', $id)
            ->with('status', 'Updated the selected todo!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Delete the Todo
        $todo = Todo::findOrFail($id);
        $todo->delete();

        // redirect to specified route
        return redirect()
            ->route('todos.index')
            ->with('status', 'Deleted the selected todo!');
    }
}