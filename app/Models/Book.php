<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
  use HasFactory;
  protected $fillable = [
    // 'user_id',
    'institution',
    'hostel',
    'pickup',
    'return',
    'description',
    'user_id',
    'jute_boxes',
    'total_amount',
    'months',
    'duration',
    'address',
    'latitude',
    'longitude',
    'location_address',
    'image',
    // 'price_per_month',

  ];
  protected $rules = [
    'institution'    => 'required ',
    'hostel'   => 'required ',
    'pickup'   => 'required ',
    'return'   => 'required ',
    'duration'   => ' ',
    'months'   => 'required ',
    'jute_boxes'   => 'required ',
    'total_amount'   => 'required ',
    'address'   => 'required ',
    'description'    => 'required ',
    'image' => 'array',
  ];


  protected $casts = [
    'image' => 'array',
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
