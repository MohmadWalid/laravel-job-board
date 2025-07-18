<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

// Protected Routes (Login)
Route::middleware('auth')->group(function () {
    Route::resource('blog', PostController::class);
    Route::post('/blog/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
});

Route::middleware('onlyMe')->group(function () {
    Route::get('/about', AboutController::class)->name('about'); // Single Action Controllers
});


// Public Routes (Guest)
Route::get('/', IndexController::class)->name('index'); // Single Action Controllers
Route::get('/contact', ContactController::class)->name('contact'); // Single Action Controllers

Route::resource('tags', TagController::class);


Route::get('/jobs', [JobController::class, 'index']);

Route::get('/signup', [AuthController::class, 'showSignupForm'])->name('showSignupForm');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('showLoginForm');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
