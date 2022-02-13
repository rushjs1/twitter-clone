<?php

namespace App\Http\Controllers\Api\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tweet;

class ProfileController extends Controller
{
    //

    public function index(Request $req)
    {
        
         $tweets = Tweet::with([
            'user',
            'likes',
            'retweets',
            'replies',
            'media.baseMedia',
            'originalTweet.user',
            'originalTweet.likes',
            'originalTweet.retweets',
            'originalTweets.media.baseMedia'
          ])->where('user_id', $req->user()->id); 

          dd($tweets);
    }
}
