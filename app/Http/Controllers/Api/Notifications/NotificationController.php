<?php

namespace App\Http\Controllers\Api\Notifications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\NotificationCollection;


class NotificationController extends Controller
{

   // public function __construct()
   // {
   //     $this->middleware(['auth:sanctum']);
   // }


    public function index(Request $request)
    {
        $notifications = $request->user()->notifications;

        return new NotificationCollection($notifications);
    }
}
