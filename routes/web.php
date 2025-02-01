<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\TaskController;

Route::get('/', function () {
    return view('auth.login');
})->name('login');

Route::get('dashboard', function() {
    return view('admin.index');
})->name('dashboard')->middleware('auth');

Route::post('authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::prefix('admin')->controller(EmployeeController::class)->group(function() {
    Route::get('employee', 'index')->name('employee.index');
    Route::post('employee', 'store')->name('employee.store');
    Route::get('employee/create', 'create')->name('employee.create');
})->middleware('auth');

Route::prefix('admin')->controller(TaskController::class)->group(function() {
    Route::get('tasks', 'index')->name('tasks.index');
    Route::post('tasks', 'store')->name('tasks.store');
    Route::get('tasks/create', 'create')->name('tasks.create');
})->middleware('auth');

/* Thisu Routes is for employees */
Route::get('my-tasks', [App\Http\Controllers\Employee\TaskController::class, 'index'])->name('employee.tasks.index');
Route::get('fetch-task/{id}', [App\Http\Controllers\Employee\TaskController::class, 'fetchTask'])->name('employee.tasks.fetch');
Route::post('task-update-status', [App\Http\Controllers\Employee\TaskController::class, 'updateTaskStatus'])->name('employee.tasks.update-status');
