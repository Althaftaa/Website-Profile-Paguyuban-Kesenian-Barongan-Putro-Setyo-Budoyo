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
        'address',
        'phone',
        'email',
        'google_maps',
        'instagram',
        'facebook',
        'youtube',
    ];
}
