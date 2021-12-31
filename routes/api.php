<?php
Route::get('/timeline', [App\Http\Controllers\Api\Timeline\TimelineController::class, 'index']);

Route::post('/tweets', [App\Http\Controllers\Api\Tweets\TweetController::class, 'store']);

Route::post('/tweets/{tweet}/likes', [App\Http\Controllers\Api\Tweets\TweetLikeController::class, 'store']);

Route::delete('/tweets/{tweet}/likes', [App\Http\Controllers\Api\Tweets\TweetLikeController::class, 'destroy']);
