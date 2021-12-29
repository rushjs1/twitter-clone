<?php

namespace App\Http\Controllers\Api\Timeline;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\TweetCollection;

class TimelineController extends Controller
{
    // auth

    public function index(Request $req)
    {
        //dd($req->user()->tweetsFromFollowing);

        $tweets = $req->user()->tweetsFromFollowing()->paginate(5);
    
        return new TweetCollection($tweets);
    }
}
