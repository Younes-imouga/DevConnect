<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ConnectionController;

Route::get('/welcome', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/', [PostsController::class, 'dashboard'])->name('/');
    Route::get('/dashboard', [PostsController::class, 'dashboard'])->name('dashboard');
    Route::post('/posts', [PostsController::class, 'store'])->name('posts.store');
    
    Route::get('/my-posts', [PostsController::class, 'myPosts'])->name('posts.my');
    Route::get('/posts/{post}/edit', [PostsController::class, 'edit'])->name('posts.edit');
    Route::post('/posts/{post}', [PostsController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostsController::class, 'destroy'])->name('posts.destroy');

    Route::post('/posts/{post}/like', [LikeController::class, 'toggleLike'])->name('posts.like');
    Route::get('/posts/{post}/check-like', [LikeController::class, 'checkLike'])->name('posts.checkLike');

    Route::post('/posts/{post}/comments', [CommentController::class, 'addComment'])->name('posts.addComment');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/connections', [PostsController::class, 'Connections'])->name('connection');

    Route::post('/connections/send', [ConnectionController::class, 'sendConnection'])->name('connections.send');
    Route::post('/connections/{id}/accept', [ConnectionController::class, 'acceptConnection'])->name('connections.accept');
    Route::post('/connections/{id}/decline', [ConnectionController::class, 'declineConnection'])->name('connections.decline');
    
    Route::get('/dashboard/search', [PostsController::class, 'search']);
});


require __DIR__.'/auth.php';
