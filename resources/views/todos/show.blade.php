@extends('layouts.app')

@section('title', 'View Todo')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-6">
            <div class="flex justify-between items-start mb-4">
                <h2 class="text-2xl font-bold">{{ $todo->title }}</h2>
                <span class="px-3 py-1 rounded-full text-xs font-medium {{ $todo->is_completed ? 'bg-green-500 text-white' : 'bg-yellow-400 text-black' }}">
                    {{ $todo->is_completed ? 'Completed' : 'Pending' }}
                </span>
            </div>
            
            @if($todo->description)
                <div class="mb-4">
                    <p class="font-semibold text-gray-700 mb-1">Description:</p>
                    <p class="text-gray-600">{{ $todo->description }}</p>
                </div>
            @endif
            
            <div class="text-sm text-gray-600 space-y-1 mb-6">
                <p><strong>Due Date:</strong> {{ $todo->due_date->format('Y-m-d') }}</p>
                <p><strong>Created:</strong> {{ $todo->created_at->format('Y-m-d H:i') }}</p>
                @if($todo->is_completed)
                    <p><strong>Completed:</strong> {{ $todo->updated_at->format('Y-m-d H:i') }}</p>
                @endif
            </div>
            
            <div class="flex gap-3 mt-6">
                <a href="{{ route('todos.edit', $todo) }}" class="px-6 py-2 bg-blue-500 text-white rounded-lg font-medium hover:bg-blue-600">Edit</a>
                <a href="{{ route('todos.index') }}" class="px-6 py-2 bg-gray-500 text-white rounded-lg font-medium hover:bg-gray-600">Back to List</a>
            </div>
        </div>
    </div>
@endsection
