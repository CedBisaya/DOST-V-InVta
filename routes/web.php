<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController; 
use App\Http\Controllers\LogsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/users', function () {
    return view('admin.users.users');
})->name('users');

Route::get('/index', function () {
    return view('admin.users.index');
})->name('index');

Route::get('/logs', function () {
    return view('admin.logs.logs');
})->name('logs');

Route::get('/reports', function () {
    return view('admin.reports.reports');
})->name('reports');

Route::get('/create', function () {
    return view('admin.users.create');
})->name('create');

Route::get('/edit', function () {
    return view('admin.users.edit');
})->name('edit');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::middleware(['auth'])->group(function () {
    //Route::get('/users/create', [UsersController::class, 'create'])->name('users.create'); 
    //Route::get('/users/{user}/edit', [UsersController::class, 'edit'])->name('users.edit');
    //Route::put('/users/{user}', [UsersController::class, 'update'])->name('users.update');
    //Route::post('/users', [UsersController::class, 'store'])->name('users.store');   
    //Route::patch('/users/{user}/deactivate', [UsersController::class, 'deactivate'])->name('users.deactivate');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';