<?php

namespace App\Http\Controllers\Api\Tweets;

use App\Tweets\TweetType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\Tweets\TweetWasCreated;
use App\Http\Requests\Tweets\TweetStoreRequest;

class TweetController extends Controller
{
    //
    public function __construct() 
    {
        $this->middleware(['auth:sanctum'])->only(['store']);
    }
 

    public function store(TweetStoreRequest $req)
    {

      $tweet = $req->user()->tweets()->create(array_merge($req->only('body'),[
        'type' => TweetType::TWEET
      ]));

      broadcast(new TweetWasCreated($tweet));
    }
}
