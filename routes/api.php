<?php
Route::get('/timeline', [App\Http\Controllers\Api\Timeline\TimelineController::class, 'index']);

Route::post('/tweets', [App\Http\Controllers\Api\Tweets\TweetController::class, 'store']);