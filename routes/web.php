<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\UserController;

Route::get('/', function () {
    return view('welcome');
})->name('login');

Route::get('dashboard', function() {
    return view('admin.index');
})->name('dashboard')->middleware('auth');

Route::post('authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::prefix('admin')->controller(UserController::class)->group(function() {
    Route::get('users', 'index');


})->middleware('auth');