<?php

namespace App\Tweets\Entities;
use Illuminate\Database\Eloquent\Collection;
use App\Models\User;


class EntityDatabaseCollection extends Collection 
{

    public function users()
    {
        return User::whereIn('username', $this->pluck('body_plain'))->get();
    }
}