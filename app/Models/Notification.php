<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
  protected $fillable = ['message', 'created_at']; // Fillable attributes

  // Your custom methods or relationships can be defined here
}
