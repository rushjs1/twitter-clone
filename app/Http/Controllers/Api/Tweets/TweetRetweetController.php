<?php

namespace App\Http\Controllers\Api\Tweets;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tweet;
use App\Tweets\TweetType;
use App\Events\Tweets\TweetWasCreated;
use App\Events\Tweets\TweetWasDeleted;
use App\Events\Tweets\TweetRetweetsWereUpdated;


class TweetRetweetController extends Controller
{
    //

    public function store(Tweet $tweet, Request $request){
        $retweet = $request->user()->tweets()->create([
            'type' => TweetType::RETWEET,
            'original_tweet_id' => $tweet->id
        ]);
        broadcast(new TweetWasCreated($retweet));
        broadcast(new TweetRetweetsWereUpdated($request->user(), $tweet));

    }
    public function destroy(Tweet $tweet, Request $request)
    {
        broadcast(new TweetWasDeleted($tweet->retweetedTweets));

        $tweet->retweetedTweets()->where('user_id', $request->user()->id)->delete();

        broadcast(new TweetRetweetsWereUpdated($request->user(), $tweet));
        
    }
}
