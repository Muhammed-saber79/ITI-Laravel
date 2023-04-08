<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UsersController;
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

Route::get('/', [PostsController::class,'index'])->name('posts.index');
Route::get('/posts/create' , [PostsController::class , 'create'])->name('posts.create');
Route::post('/posts' , [PostsController::class , 'store'])->name('posts.store');
Route::get('/posts/{post_id}' , [PostsController::class , 'show'])->name('posts.show');
Route::get('/posts/edit/{post_id}' , [PostsController::class , 'edit'])->name('posts.edit');
Route::put('/posts/{post_id}' , [PostsController::class , 'update'])->name('posts.update');
Route::delete('/posts/{post_id}' , [PostsController::class , 'destroy'])->name('posts.destroy');

Route::get('/users' , [UsersController::class , 'index'])->name('users.index');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
