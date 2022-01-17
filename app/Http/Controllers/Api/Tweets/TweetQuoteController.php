<?php

namespace App\Http\Controllers\Api\Tweets;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tweet;
use App\Tweets\TweetType;
use App\Events\Tweets\TweetWasCreated;
use App\Events\Tweets\TweetWasDeleted;
use App\Events\Tweets\TweetRetweetsWereUpdated;

class TweetQuoteController extends Controller
{
    //make sure user is logged into be able to quote
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    public function store(Tweet $tweet, Request $request)
    {
        $retweet = $request->user()->tweets()->create([
            'type' => TweetType::QUOTE,
            'body' => $request->body,
            'original_tweet_id' => $tweet->id
        ]);
        broadcast(new TweetWasCreated($retweet));
        broadcast(new TweetRetweetsWereUpdated($request->user(), $tweet));
    }
}
