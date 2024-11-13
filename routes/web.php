<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

// Route::get('/home', function () {
//     return view('home');
// })->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('todos', TodoController::class);
});



// Route::get('todos', [TodoController::class, 'index'])->name('todos.index');
// Route::get('todos/create', [TodoController::class, 'create'])->name('todos.create');
// Route::post('todos/store', [TodoController::class, 'store'])->name('todos.store');
// Route::get('todos/show/{id}', [TodoController::class, 'show'])->name('todos.show');
// Route::get('todos/{id}/edit', [TodoController::class, 'edit'])->name('todos.edit');
// Route::put('todos/update', [TodoController::class, 'update'])->name('todos.update');

require __DIR__.'/auth.php';
