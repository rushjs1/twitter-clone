<?php

namespace App\Http\Controllers\Api\Media;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TweetMedia;

class MediaController extends Controller
{
    public function __construct()
    {
       // $this->middleware(['auth:sanctum']);
    }


    public function store(Request $request)
    {
       $res = collect($request->media)->map(function($media){
           return $this->addMedia($media);
       });
    }
    protected function addMedia($media)
    {
       $tweetMedia = TweetMedia::create([]);

       $tweetMedia->baseMedia()->associate($tweetMedia->addMedia($media)->toMediaCollection())->save();

    }
}
