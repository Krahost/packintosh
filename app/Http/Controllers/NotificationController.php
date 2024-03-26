<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
  public function index()
  {
    $notifications = Notification::all(); // Fetch notifications from the database
    return view('notifications.index', ['notifications' => $notifications]);
  }

  public function show($id)
  {
    $notification = Notification::findOrFail($id);
    return response()->json($notification);
  }

  public function markAsRead($id)
  {
    $notification = Notification::findOrFail($id);
    $notification->read = true;
    $notification->save();
    return response()->json(['message' => 'Notification marked as read']);
  }
}
