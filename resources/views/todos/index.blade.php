@extends('layouts.app')

@section('title', 'My Todos')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h2 class="text-3xl font-bold mb-6">My Todos</h2>
        
        @if($todos->count() > 0)
            <div class="space-y-4">
                @foreach($todos as $todo)
                    <div class="bg-white rounded-lg shadow-md p-6 {{ $todo->is_completed ? 'opacity-70' : '' }}">
                        <div class="flex justify-between items-start mb-4">
                            <h3 class="text-xl font-semibold">{{ $todo->title }}</h3>
                            <span class="px-3 py-1 rounded-full text-xs font-medium {{ $todo->is_completed ? 'bg-green-500 text-white' : 'bg-yellow-400 text-black' }}">
                                {{ $todo->is_completed ? 'Completed' : 'Pending' }}
                            </span>
                        </div>
                        @if($todo->description)
                            <p class="text-gray-700 mb-2">{{ $todo->description }}</p>
                        @endif
                        <div class="text-sm text-gray-600 space-y-1 mb-4">
                            <p><strong>Due Date:</strong> {{ $todo->due_date->format('Y-m-d') }}</p>
                            <p><strong>Created:</strong> {{ $todo->created_at->format('Y-m-d H:i') }}</p>
                            @if($todo->is_completed)
                                <p><strong>Completed:</strong> {{ $todo->updated_at->format('Y-m-d H:i') }}</p>
                            @endif
                        </div>
                        <div class="flex gap-2 mt-4">
                            @if(!$todo->is_completed)
                                <form action="{{ route('todos.toggle-complete', $todo) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="px-4 py-2 rounded text-sm font-medium bg-green-500 text-white hover:bg-green-600">
                                        Mark as Complete
                                    </button>
                                </form>
                            @endif
                            <a href="{{ route('todos.edit', $todo) }}" class="px-4 py-2 bg-blue-500 text-white rounded text-sm font-medium hover:bg-blue-600">Edit</a>
                            <form action="{{ route('todos.destroy', $todo) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this todo?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded text-sm font-medium hover:bg-red-600">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="bg-white rounded-lg shadow-md p-6 text-center">
                <p class="text-gray-600">No todos found. <a href="{{ route('todos.create') }}" class="text-blue-500 hover:underline">Create your first todo</a></p>
            </div>
        @endif
    </div>
@endsection
