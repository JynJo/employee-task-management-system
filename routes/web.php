<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\TaskController;
use App\Models\Task;
use App\Models\User;

Route::get('/', function () {
    return view('auth.login');
})->name('login');

Route::get('dashboard', function() {
    $employee_count = User::has('employee')->count();
    $tasks_count = Task::count();
    $completed_tasks = Task::where('status', 'completed')->count();
    $incomplete_tasks = Task::where('status', 'incomplete')->count();
    return view('admin.index', compact('employee_count', 'tasks_count', 'completed_tasks', 'incomplete_tasks'));
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

Route::get('my-attendances', [App\Http\Controllers\Employee\AttendanceController::class, 'index'])->name('employee.attendances.index');
Route::post('my-attendances', [App\Http\Controllers\Employee\AttendanceController::class, 'store'])->name('employee.attendances.store');
