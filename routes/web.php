<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');
});

Route::get('/dashboard', [PostsController::class, 'dashboard'])->name('dashboard');
Route::post('/posts', [PostsController::class, 'store'])->name('posts.store');
Route::get('/my-posts', [PostsController::class, 'myPosts'])->name('posts.my');
Route::get('/posts/{post}/edit', [PostsController::class, 'edit'])->name('posts.edit');
Route::post('/posts/{post}', [PostsController::class, 'update'])->name('posts.update');
Route::delete('/posts/{post}', [PostsController::class, 'destroy'])->name('posts.destroy');
Route::post('/posts/{post}/like', [PostsController::class, 'toggleLike'])->name('posts.like');

        Route::post('/posts/{post}/like', [PostsController::class, 'toggleLike'])->name('posts.like');
        Route::get('/posts/{post}/check-like', [PostsController::class, 'checkLike'])->name('posts.checkLike');
require __DIR__.'/auth.php';
