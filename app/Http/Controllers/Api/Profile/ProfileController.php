<?php

namespace App\Http\Controllers\Api\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tweet;
use App\Http\Resources\TweetCollection;
use App\Http\Resources\TweetResource;
use App\Models\TweetMedia; 

class ProfileController extends Controller
{
    //

    public function index(Request $req)
    {
        
         $tweets = $req->user()->tweets()->with([
            'user',
            'likes',
            'retweets',
            'replies',
            'media.baseMedia',
            'originalTweet.user',
            'originalTweet.likes',
            'originalTweet.retweets',
            'originalTweet.media.baseMedia'
          ])->paginate(6); 

         return new TweetCollection($tweets);
    }
}
