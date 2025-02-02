<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\AuditController;

Route::get('/', [DashboardController::class, 'admin'])->name('dashboard');

// Audit
Route::get('/audit', [AuditController::class, 'index'])->name('audit.index');
