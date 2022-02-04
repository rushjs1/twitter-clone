<?php

namespace App\Http\Controllers\Tweets;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tweet;

class TweetController extends Controller
{
    public function show(Tweet $tweet)
    {
        return view('tweets.show', compact('tweet'));
    }
}

