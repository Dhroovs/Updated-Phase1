<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserDetailController;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// 🔥 REMOVE 'web' from here
Route::middleware(['auth.custom'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/dashboard/update', [DashboardController::class, 'update'])->name('dashboard.update');

    Route::get('/records', [UserDetailController::class, 'index'])->name('records.index');
    Route::get('/records/create', [UserDetailController::class, 'create'])->name('records.create');
    Route::post('/records', [UserDetailController::class, 'store'])->name('records.store');
    Route::get('/records/{id}/edit', [UserDetailController::class, 'edit'])->name('records.edit');
    Route::put('/records/{id}', [UserDetailController::class, 'update'])->name('records.update');
    Route::delete('/records/{id}', [UserDetailController::class, 'destroy'])->name('records.destroy');

});