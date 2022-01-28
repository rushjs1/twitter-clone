<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Like;
use App\Models\TweetMedia;
use App\Models\Entity;
use App\Tweets\Entities\EntityExtractor;


use Illuminate\Database\Eloquent\Relationships\HasOne;
use illuminate\Database\Eloquent\Relationships\HasMany;

use Illuminate\Database\Eloquent\Builder;



class Tweet extends Model
{
    use HasFactory;


    protected $guarded = [];

    public static function boot()
    {
        parent::boot();
        static::created(function(Tweet $tweet){
            $tweet->entities()->createMany(
                (new EntityExtractor($tweet->body))->getHastagEntities()
            );
        });
    }



    public function scopeParent(Builder $builder)
    {
        return $builder->whereNull('parent_id');
    }

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

    public function media() 
    {
        return $this->hasMany(TweetMedia::class);
    }
    public function replies()
    {
        return $this->hasMany(Tweet::class, 'parent_id');
    }

    public function entities()
    {
        return $this->hasMany(Entity::class);
    }
}
