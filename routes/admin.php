<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\AuditController;
use App\Http\Controllers\Admin\UserController;

Route::get('/', [DashboardController::class, 'admin'])->name('dashboard');

// Audit
Route::get('/audit', [AuditController::class, 'index'])->name('audit.index');

// Users
Route::get('/users/{user}/password', [UserController::class, 'password'])->name('users.password');
Route::post('/users/{user}/password', [UserController::class, 'password_update'])->name('users.password_update');

Route::resources([
  'users' => UserController::class,
]);
