<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Tweets\Entities\EntityDatabaseCollection;


class Entity extends Model
{
    //allow mass assignment for everything
    protected $guarded = [];

    public function newCollection(array $models = []){

        return new EntityDatabaseCollection($models);
    }

}
