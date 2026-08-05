<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [

        'title',

        'description',

        'youtube_url',

        'youtube_id',

        'activity_date',

    ];

    protected $casts = [

        'activity_date' => 'date',

    ];
}
