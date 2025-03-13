<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
Route::get('/', function () {
    return view('welcome');
});
*/

/*

Route::get("/", [TaskController::class, 'index']);
Route::get("tasks/create", [TaskController::class, 'create']);
Route::post("tasks/store", [TaskController::class, 'store']);

Route::get("tasks/{id}", [TaskController::class, 'show']);
Route::get("tasks/{id}/edit", [TaskController::class, 'edit']); // this is needed internally    

Route::put("tasks/{id}/update", [TaskController::class, 'update']); // TO update the task

Route::delete("tasks/{id}/delete", [TaskController::class, 'destroy']); // TO update the task

*/


Route::prefix('tasks')->group(function () {
    Route::get('/', [TaskController::class, 'index'])->name('tasks.index'); // List tasks
    Route::get('/create', [TaskController::class, 'create'])->name('tasks.create'); // Show create form
    Route::post('/store', [TaskController::class, 'store'])->name('tasks.store'); // Store task
    Route::get('/{id}', [TaskController::class, 'show'])->name('tasks.show'); // Show task details
    Route::get('/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit'); // Show edit form
    Route::put('/{id}', [TaskController::class, 'update'])->name('tasks.update'); // Update task
    Route::delete('/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy'); // Delete task
});