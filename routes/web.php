<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    // sleep(2);
    return Inertia::render('Home');
})->name('home');

Route::inertia('/about', 'About', ['user' => 'Mike'])->name('about');
