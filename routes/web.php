<?php

use App\Livewire\Auth\Login;
use Illuminate\Support\Facades\Route;

// ! AUTHENTICATED ROUTES ! //
Route::middleware('auth')->prefix('authd')->as('authd.')->group(function () {
    Route::get('/', fn() => "Authenticated Home")->name('home');
});


Route::middleware('guest')->group(function () {
    // ! LOGIN ROUTES ! //
    Route::get('/login', Login::class)->name('login');

    // ! OPEN TO PUBLIC ROUTES ! //
    Route::get('/', fn() => "Unauthenticated Home")->name('home');
});
