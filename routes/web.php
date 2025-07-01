<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/about', [IndexController::class, 'about'])->name('about');
Route::get('/contact', [IndexController::class, 'contact'])->name('contact');

Route::get('/blog', [PostController::class, 'index'])->name('blogs.index');
Route::get('/blog/create', [PostController::class, 'create'])->name('blog.create');
Route::get('/blog/{id}', [PostController::class, 'show'])->name('blog.show');


Route::get('/comments', [CommentController::class, 'index'])->name('comments.index');
Route::get('/comments/create', [CommentController::class, 'create'])->name('comments.create');

Route::get('/jobs', [JobController::class, 'index']);

Route::get('/tags', [TagController::class, 'index'])->name('tags.index');
Route::get('/tags/create', [TagController::class, 'create'])->name('tags.create');
Route::get('/tags/test', [TagController::class, 'test_manyToMany']);
