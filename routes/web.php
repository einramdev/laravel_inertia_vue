<?php

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Route::inertia('/', 'Home', ['users' => User::all()])->name('home');

Route::get('/', function () {
    return Inertia::render('Home', [
        'users' => User::paginate(5),
    ]);
})->name('home');

Route::middleware('auth')->group(function() {
    // User Dashboard
    Route::inertia('/dashboard', 'Dashboard')->name('dashboard');

    // Logout User
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function () {
    // Register User
    Route::inertia('/register', 'Auth/Register')->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    // Login User
    Route::inertia('/login', 'Auth/Login')->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});



