<?php

namespace App\Http\Controllers\Api\Tweets;

use App\Tweets\TweetType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\Tweets\TweetWasCreated;
use App\Http\Requests\Tweets\TweetStoreRequest;
use App\Models\TweetMedia;
use App\Http\Resources\TweetCollection;

use App\Models\Tweet;

class TweetController extends Controller
{
    //
    public function __construct() 
    {
        $this->middleware(['auth:sanctum'])->only(['store']);
    }

    public function index(Request $request){

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
      ])->find(explode(',', $request->ids));
      
      return new TweetCollection($tweets);
    }
 

    public function store(TweetStoreRequest $req)
    {

      $tweet = $req->user()->tweets()->create(array_merge($req->only('body'),[
        'type' => TweetType::TWEET
      ]));

      foreach($req->media as $id){
        $tweet->media()->save(TweetMedia::find($id));
      }

      broadcast(new TweetWasCreated($tweet));
    }
}
