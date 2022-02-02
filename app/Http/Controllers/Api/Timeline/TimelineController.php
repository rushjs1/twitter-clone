<?php

namespace App\Http\Controllers\Api\Timeline;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\TweetCollection;

class TimelineController extends Controller
{
    // auth

      public function __construct()
    {
    $this->middleware(['auth:sanctum']);
    }  


    public function index(Request $req)
    {
        $tweets = $req->user()
        ->tweetsFromFollowing()
        ->parent()
        ->latest()
        ->with([
            'user',
            'likes',
            'retweets',
            'replies',
            'entities',
            'media.baseMedia',
            'originalTweet.user',
            'originalTweet.likes',
            'originalTweet.retweets',
            'originalTweet.media.baseMedia',
        ])
        ->paginate(6);

        return new TweetCollection($tweets);
    }
}
