<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PostController::class, 'index']);
Route::get('users/{user}/comments', [UserController::class, 'showUserComments'])->name('user.comments');
Route::get('users/{user}/my-profile', [UserController::class, 'userProfile'])->name('user.profile');

Route::resource('users', UserController::class);
Route::resource('posts', PostController::class);
Route::resource('comments', CommentController::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
