<?php

namespace App\Tweets\Entities;
use Illuminate\Database\Eloquent\Collection;


class EntityDatabaseCollection extends Collection 
{

    public function users()
    {
        return ['a','b','c'];
    }
}