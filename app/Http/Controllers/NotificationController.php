<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    //Notification
    public static function sendNotify($type, $message){
        session()->put($type, $message);
    }
}
