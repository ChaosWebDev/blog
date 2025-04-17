<?php

use App\Models\Post;
use App\Livewire\Post\Edit;
use App\Livewire\Auth\Login;
use App\Livewire\Post\Index;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// ! AUTHENTICATED ROUTES ! //
Route::middleware('auth')->prefix('authd')->as('authd.')->group(function () {
    Route::get('/', fn() => "Authenticated Home")->name('home');

    Route::prefix('/post')->as('posts.')->group(function () {
        Route::get('/', Index::class)->name('index');
        Route::get('/create', function () {
            $post = Post::create([]);
            $post->slug = "New Post-{$post->id}";
            $post->title = "New Post - {$post->id}";
            $post->save();
            return redirect()->route('authd.posts.edit', $post->slug);
        })->name('create');
        Route::get('/{slug}/edit', Edit::class)->name('edit');
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
