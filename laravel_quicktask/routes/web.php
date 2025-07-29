<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;
use App\Http\Middleware\CheckSuperAdmin;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/tasks/create', [TaskController::class,'create'])->name('tasks.create');
Route::get('/tasks/edit', [TaskController::class,'edit'])->name('tasks.edit');
Route::get('/tasks/{task}', [TaskController::class,'show'])->name('tasks.show');
Route::post('/tasks', [TaskController::class,'store'])->name('tasks.store');
Route::put('/tasks/{task}', [TaskController::class,'update'])->name('tasks.update');
Route::delete('/tasks/{task}', [TaskController::class,'destroy'])->name('tasks.destroy');

Route::middleware(CheckSuperAdmin::class)->group(function () 
{
    Route::resource('/users', UserController::class);
});
