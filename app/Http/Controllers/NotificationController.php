<?php

namespace App\Http\Controllers;

use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Response;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = DatabaseNotification::all();
        return view('notifications.index', compact('notifications'));
    }

    public function destroy()
    {
        $notifications = auth()->user()->notifications();
        $notifications->map(fn($notification) => $notification->delete());
    }

    public function update(DatabaseNotification $notification)
    {
        $notification->markAsRead();

        return Response::redirectToRoute('notifications.index');
    }
}
