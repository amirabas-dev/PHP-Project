<?php

namespace App\Http\Controllers;

class NotificationController extends Controller
{
    public function show($id)
    {
        $notifications = session('dashboard_notifications', []);
        $notification = collect($notifications)->firstWhere('id', $id);

        if (! $notification) {
            $notification = [
                'id' => $id,
                'title' => 'Notification',
                'message' => 'This notification is no longer available.',
            ];
        }

        return view('notification_detail', ['notification' => $notification]);
    }
}
