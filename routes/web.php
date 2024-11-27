<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PostController::class, 'index'])->name('post.index');
// Route::get('post/{id}', [PostController::class, 'show'])->name('post.show');
Route::resource('post', PostController::class);
Route::post('post/{post}/comment', [PostController::class, 'commentStore'])->name('post.comment');
Route::resource('comment', CommentController::class);

Route::get('comment/{comment}/edit', [CommentController::class, 'edit'])->name('comment.edit');
Route::post('comment/{comment}/update', [CommentController::class, 'update'])->name('comment.update');

Route::get('post/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::post('post/{post}/update', [PostController::class, 'update'])->name('post.update');