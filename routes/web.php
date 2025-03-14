<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;

Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::get('/posts/my-posts', [PostController::class, 'myPosts'])->name('posts.my');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/signup', [AuthController::class, 'showSignupForm'])->name('signup');
Route::post('/signup', [AuthController::class, 'signup']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::delete('/admin/posts/{post}', [AdminController::class, 'destroy'])->name('admin.posts.destroy');
