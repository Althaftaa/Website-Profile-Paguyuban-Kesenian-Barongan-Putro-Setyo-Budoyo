<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name',
        'description',
        'history',
        'philosophy',
        'vision',
        'mission',
        'logo',
        'profile_image',
        'hero_media_type',
        'hero_video',
        'address',
        'phone',
        'email',
        'google_maps',
        'instagram',
        'facebook',
        'youtube',
    ];
}
