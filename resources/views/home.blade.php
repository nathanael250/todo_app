@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-6 text-center">
            <h2 class="text-2xl font-bold mb-4">Dashboard</h2>
            <p class="text-gray-600 mb-6">You are logged in!</p>
            <a href="{{ route('todos.index') }}" class="inline-block px-6 py-2 bg-blue-500 text-white rounded-lg font-medium hover:bg-blue-600">Go to My Todos</a>
        </div>
    </div>
@endsection
