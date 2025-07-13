<?php


use App\Http\Controllers\CommentController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/', IndexController::class)->name('index'); // Single Action Controllers
Route::get('/about', AboutController::class)->name('about'); // Single Action Controllers
Route::get('/contact', ContactController::class)->name('contact'); // Single Action Controllers

Route::resource('blog', PostController::class);

Route::resource('comments', CommentController::class);

Route::resource('tags', TagController::class);


Route::get('/jobs', [JobController::class, 'index']);
