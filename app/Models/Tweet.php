<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Like;

use Illuminate\Database\Eloquent\Relationships\HasOne;
use illuminate\Database\Eloquent\Relationships\HasMany;


class Tweet extends Model
{
    use HasFactory;


    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function originalTweet()
    {
        return $this->hasOne(Tweet::class, 'id', 'original_tweet_id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class);

    }

    public function retweets()
    {
        return $this->hasMany(Tweet::class, 'original_tweet_id');

    }

    public function retweetedTweets()
    {
        return $this->hasOne(Tweet::class, 'original_tweet_id', 'id');
    }
}
