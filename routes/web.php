<?php

use App\Livewire\Auth\Login;
use Illuminate\Support\Facades\Route;

// ! LOGIN ROUTES ! //
Route::middleware('guest')->group(function () {
    Route::get('/login', Login::class)->name('login');
});

// ! MUST BE AUTHENTICATED ROUTES ! //
Route::middleware('auth')->group(function () {
    //
});

// ! OPEN TO PUBLIC ROUTES ! //
// TODO - [[PLACEHOLDER]] - TODO //
