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
        ->latest()
        ->with([
            'user'
        ])
        ->paginate(6);

        return new TweetCollection($tweets);
    }
}
