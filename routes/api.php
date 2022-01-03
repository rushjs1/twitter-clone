<?php
Route::get('/timeline', [App\Http\Controllers\Api\Timeline\TimelineController::class, 'index']);

Route::post('/tweets', [App\Http\Controllers\Api\Tweets\TweetController::class, 'store']);

Route::post('/tweets/{tweet}/likes', [App\Http\Controllers\Api\Tweets\TweetLikeController::class, 'store']);
Route::delete('/tweets/{tweet}/likes', [App\Http\Controllers\Api\Tweets\TweetLikeController::class, 'destroy']);

Route::post('/tweets/{tweet}/retweets', [App\Http\Controllers\Api\Tweets\TweetRetweetController::class, 'store']);
Route::delete('/tweets/{tweet}/retweets', [App\Http\Controllers\Api\Tweets\TweetRetweetController::class, 'destroy']);

Route::post('/media', [App\Http\Controllers\Api\Media\MediaController::class, 'store']);
Route::get('/media/types', [App\Http\Controllers\Api\Media\MediaTypesController::class, 'index']);