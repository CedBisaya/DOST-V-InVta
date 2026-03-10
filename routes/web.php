<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController; // Inimport natin ito
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home route - redirect agad sa login
Route::get('/', function () {
    return redirect()->route('login');
});

// Logout route
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');

/**
 * DASHBOARD ROUTE
 * Dito natin pinalitan ang dating function para gamitin na ang DashboardController.
 * Ito ang magpapasa ng $managers data sa view mo.
 */
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

/**
 * AUTH ROUTES (Profile management)
 */
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Isama ang default auth routes mula sa Laravel Breeze
require __DIR__.'/auth.php';