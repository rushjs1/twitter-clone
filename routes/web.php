<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/notifications' , [App\Http\Controllers\Notifications\NotificationController::class, 'index']);

Route::get('/timeline', [App\Http\Controllers\Api\Timeline\TimelineController::class, 'index']);

Route::get('/tweets/{tweet}', [App\Http\Controllers\Tweets\TweetController::class, 'show']);

Route::get('/profile/{username}', [App\Http\Controllers\Profile\ProfileController::class, 'index']);

Route::get('/profile/api/profile', [App\Http\Controllers\Api\Profile\ProfileController::class, 'index']);

Route::get('/api/notifications' , [App\Http\Controllers\Api\Notifications\NotificationController::class, 'index']);

Route::get('/api/user', [App\Http\Controllers\Api\User\UserController::class, 'index']);
