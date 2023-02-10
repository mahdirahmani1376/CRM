<?php

namespace App\Http\Controllers;

use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Response;

class NotificationController extends Controller
{
    public function notifications()
    {
        $user = auth()->user();
        if (! $user->can(['delete', 'manage users'])) {
            return $user->notifications;
        }

        return DatabaseNotification::all();
    }

    public function index()
    {
        $notifications = $this->notifications();

        return view('notifications.index', compact('notifications'));
    }

    public function destroy()
    {
        $this->notifications()->map(fn ($notification) => $notification->delete());
    }

    public function update(DatabaseNotification $notification)
    {
        $notification->markAsRead();

        return Response::redirectToRoute('notifications.index');
    }
}
