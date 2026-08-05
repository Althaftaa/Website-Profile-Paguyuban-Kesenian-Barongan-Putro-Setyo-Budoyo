<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'title',
        'event_date',
        'event_time',
        'location',
        'description',
        'status',
    ];

    protected $casts = [
        'event_date' => 'date',
    ];
}
