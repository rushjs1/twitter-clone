<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{

    public function index(User $user)
    {
        return view('profile.index', compact('user'));
    }
}
