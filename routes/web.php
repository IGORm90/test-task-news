<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group([ 'middleware' => 'auth'], function () {
    Route::get('/manager', [PostController::class, 'index'])->name('manager.index');
    Route::post('/post', [PostController::class, 'store'])->name('post.store');
    Route::post('/post/update', [PostController::class, 'update'])->name('post.update');
    Route::delete('/post/{post}', [PostController::class, 'delete'])->name('post.delete');
});

Route::get('/post/{post}', [PostController::class, 'show'])->name('post.show');

Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
Auth::routes();
