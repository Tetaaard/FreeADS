<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Broadcast;

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
Auth::routes(['verify' => true]);

Route::get('/', [PagesController::class, 'index']);

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/annonces',PostsController::class);
Route::post('/search',[PostsController::class, 'search'])->name('posts.search');

Route::get('/profile', [\App\Http\Controllers\UserController::class, 'index']);
Route::post('/profile',[\App\Http\Controllers\UserController::class, 'update_avatar']);


Route::get('/messages', [\App\Http\Controllers\MessageController::class, 'index'])->middleware('auth');
Route::get('/message/{id}', [\App\Http\Controllers\MessageController::class, 'getMessage'])->name('message');
Route::post('message',[\App\Http\Controllers\MessageController::class, 'sendMessage']);

