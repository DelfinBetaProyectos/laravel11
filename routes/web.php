<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;

Route::get('/', function () {
  // return view('welcome');
  return redirect()->route('login');
})->name('welcome');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
  Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
});
