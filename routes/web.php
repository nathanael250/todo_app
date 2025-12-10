<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect()->route('todos.index');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::resource('todos', TodoController::class);
    Route::patch('todos/{todo}/toggle-complete', [TodoController::class, 'toggleComplete'])
        ->name('todos.toggle-complete');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
