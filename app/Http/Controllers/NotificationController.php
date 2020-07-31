<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function messages($selected = null) {
        $messages = auth()->user()->notifications;
        if (count($messages)>0) {
            if ($selected) {
                $messages[$selected]->markAsRead();
            } else {
                $messages[0]->markAsRead();
            }
        }
        return view("messages", ['messages' => $messages, 'selected' => $selected]);
    }
}
