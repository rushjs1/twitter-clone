<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResourceForProfile;

class UserController extends Controller
{
    //
    public function index(Request $req)
    {
        $user = User::where('id', $req->id)->first();
        return new UserResourceForProfile($user);
    }
}

