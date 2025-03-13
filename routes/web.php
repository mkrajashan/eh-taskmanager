<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::prefix('tasks')->group(function () {
    Route::get('/', [TaskController::class, 'index'])->name('tasks.index'); // List tasks
    Route::get('/create', [TaskController::class, 'create'])->name('tasks.create'); // Show create form
    Route::post('/store', [TaskController::class, 'store'])->name('tasks.store'); // Store task
    Route::get('/{id}', [TaskController::class, 'show'])->name('tasks.show'); // Show task details
    Route::get('/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit'); // Show edit form
    Route::put('/{id}', [TaskController::class, 'update'])->name('tasks.update'); // Update task
    Route::delete('/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy'); // Delete task
});