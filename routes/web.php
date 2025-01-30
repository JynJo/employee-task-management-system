<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\TaskController;

Route::get('/', function () {
    return view('welcome');
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
    // Route::post('tasks', 'store')->name('tasks.store');
    // Route::get('tasks/create', 'create')->name('tasks.create');
})->middleware('auth');
