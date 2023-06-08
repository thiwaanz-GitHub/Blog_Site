<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// main page
Route::get('/' , [WelcomeController::class, 'index'])->name('welcome');


Auth::routes();

// user page display
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/home/my-posts', [HomeController::class, 'userPosts'])->name('user.all-posts');

//user posts functions
Route::get('/user/add-posts', [PostController::class, 'addPost'])->name('user.add-post');
Route::post('/user/posts/store', [PostController::class, 'store'])->name('posts.store');
Route::get('/user/posts/{id}/show', [PostController::class, 'show'])->name('posts.show');
Route::get('/user/{id}/edit', [PostController::class, 'editPost'])->name('user.edit-post');
Route::post('/user/{id}/update-post', [PostController::class, 'updatePost'])->name('user.update-post');
Route::get('/user/{id}/delete-post', [PostController::class, 'deletePost'])->name('user.delete-post');

