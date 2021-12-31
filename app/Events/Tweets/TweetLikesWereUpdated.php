<?php

namespace App\Events\Tweets;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Tweet;
use App\Models\User;

class TweetLikesWereUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    
    protected $user;
    protected $tweet;



    /**
     * Create a new event instance.
     *
     * @return void
     */
    
     public function __construct(User $user, Tweet $tweet)
     {
         $this->user = $user;
         $this->tweet = $tweet;
     }


     public function broadcastWith(){
         return [
             'id' => $this->tweet->id,
             'user_id' => $this->user->id,
             'count' => $this->tweet->likes->count()
         ];
     }

     public function broadcastAs(){

        return 'TweetLikesWereUpdated';
     }



    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('tweets');
    }
}
