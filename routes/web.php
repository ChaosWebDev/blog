<?php

use App\Livewire\Auth\Login;
use Illuminate\Support\Facades\Route;

// ! LOGIN ROUTES ! //
Route::middleware('guest')->group(function () {
    Route::get('/login', Login::class)->name('login');
});

// ! MUST BE AUTHENTICATED ROUTES ! //
Route::middleware('auth')->group(function () {
    Route::get('/', fn() => "HOME")->name('home');
});

// ! OPEN TO PUBLIC ROUTES ! //
// TODO - [[PLACEHOLDER]] - TODO //
Route::middleware('auth')->group(function () {
    Route::get('/', fn() => "Unauthed Home")->name('home');
});
