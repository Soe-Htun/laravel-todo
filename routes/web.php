<?php

use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::resource('tasks', TaskController::class)->except(['show']);
Route::post('tasks/{task}/toggle', [TaskController::class, 'toggle'])->name('tasks.toggle');

