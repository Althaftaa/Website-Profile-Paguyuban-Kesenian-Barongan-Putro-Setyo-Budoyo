<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    /**
     * Kolom yang boleh diisi.
     */
    protected $fillable = [
        'title',
        'platform',
        'description',
        'youtube_url',
        'youtube_id',
        'thumbnail',
        'activity_date',
    ];

    /**
     * Casting data.
     */
    protected $casts = [
        'activity_date' => 'date',
    ];

    /**
     * URL thumbnail video.
     *
     * YouTube:
     * menggunakan thumbnail otomatis dari YouTube.
     *
     * Instagram/TikTok:
     * menggunakan thumbnail yang di-upload admin.
     */
    public function getThumbnailUrlAttribute(): ?string
    {
        /*
         * Thumbnail otomatis YouTube
         */
        if (
            $this->platform === 'youtube'
            && $this->youtube_id
        ) {
            return 'https://img.youtube.com/vi/'
                . $this->youtube_id
                . '/hqdefault.jpg';
        }

        /*
         * Thumbnail manual Instagram / TikTok
         */
        if ($this->thumbnail) {
            return asset(
                'storage/' . ltrim($this->thumbnail, '/')
            );
        }

        /*
         * Tidak ada thumbnail
         */
        return null;
    }

    /**
     * Icon berdasarkan platform.
     */
    public function getPlatformIconAttribute(): string
    {
        return match ($this->platform) {

            'youtube' =>
            'fab fa-youtube',

            'instagram' =>
            'fab fa-instagram',

            'tiktok' =>
            'fab fa-tiktok',

            default =>
            'fas fa-video',
        };
    }

    /**
     * Nama platform.
     */
    public function getPlatformLabelAttribute(): string
    {
        return match ($this->platform) {

            'youtube' =>
            'YouTube',

            'instagram' =>
            'Instagram',

            'tiktok' =>
            'TikTok',

            default =>
            'Video',
        };
    }
}
