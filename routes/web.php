<?php

use App\Livewire\Post\Edit;
use App\Livewire\Auth\Login;
use App\Livewire\Post\Index;
use App\Livewire\Post\Create;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// ! AUTHENTICATED ROUTES ! //
Route::middleware('auth')->prefix('authd')->as('authd.')->group(function () {
    Route::get('/', fn() => "Authenticated Home")->name('home');

    Route::prefix('/post')->as('posts.')->group(function () {
        Route::get('/', Index::class)->name('index');
        Route::get('/create', Create::class)->name('create');
        Route::get('/{post}/edit', Edit::class)->name('edit');
    });
});


Route::middleware('guest')->group(function () {
    // ! LOGIN ROUTES ! //
    Route::get('/login', Login::class)->name('login');

    // ! OPEN TO PUBLIC ROUTES ! //
    Route::get('/', fn() => "Unauthenticated Home")->name('home');
});


// ? DEBUGGING ? //
Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
});
