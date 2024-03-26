<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\DatabaseMessage;

class PickupReminderNotification extends Notification
{
  use Queueable;

  protected $book;

  public function __construct($book)
  {
    $this->book = $book;
  }

  public function via($notifiable)
  {
    return ['database']; // Storing notification in the database
  }

  public function toArray($notifiable)
  {
    return [
      'book_id' => $this->book->id,
      'book_title' => $this->book->title,
      'pickup_date' => $this->book->pickup_date,
      'message' => 'A book pickup is scheduled in 2 days.'
    ];
  }
}
