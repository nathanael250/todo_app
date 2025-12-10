<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = Auth::user()->todos()->orderBy('created_at', 'desc')->get();
        return view('todos.index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:150',
            'description' => 'nullable|string',
            'due_date' => 'required|date',
        ]);

        Auth::user()->todos()->create($validated);

        return redirect()->route('todos.index')
            ->with('success', 'Todo created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        $this->authorize('view', $todo);
        return view('todos.show', compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo)
    {
        $this->authorize('update', $todo);
        return view('todos.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todo $todo)
    {
        $this->authorize('update', $todo);

        $validated = $request->validate([
            'title' => 'required|string|max:150',
            'description' => 'nullable|string',
            'due_date' => 'required|date',
        ]);

        $todo->update($validated);

        return redirect()->route('todos.index')
            ->with('success', 'Todo updated successfully.');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        $this->authorize('delete', $todo);
        $todo->delete();

        return redirect()->route('todos.index')
            ->with('success', 'Todo deleted successfully.');
    }

    /**
     * Mark a todo as completed.
     */
    public function toggleComplete(Todo $todo)
    {
        $this->authorize('update', $todo);
        
        if (!$todo->is_completed) {
            $todo->update([
                'is_completed' => true
            ]);

            return redirect()->route('todos.index')
                ->with('success', 'Todo marked as completed successfully.');
        }

        return redirect()->route('todos.index')
            ->with('info', 'Todo is already completed.');
    }
}
