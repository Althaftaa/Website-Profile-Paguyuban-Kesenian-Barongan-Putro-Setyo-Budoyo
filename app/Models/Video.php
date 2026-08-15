<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [

        'title',

        'platform',

        'description',

        'youtube_url',

        'youtube_id',

        'thumbnail',

        'activity_date',

    ];

    protected $casts = [

        'activity_date' => 'date',

    ];

    /**
     * URL/tautan sumber video, dari platform manapun (YouTube, Instagram, TikTok).
     * Nama kolom di database tetap "youtube_url" untuk alasan historis,
     * tapi sekarang menampung link dari platform apapun.
     */
    public function getVideoUrlAttribute(): ?string
    {
        return $this->youtube_url;
    }

    /**
     * URL thumbnail untuk ditampilkan di galeri/grid.
     * - YouTube: otomatis dari ID video (tidak perlu upload manual).
     * - Instagram / TikTok: pakai thumbnail yang diupload admin,
     *   kalau belum ada, kembalikan null (tampilkan ikon platform sebagai gantinya).
     */
    public function getThumbnailUrlAttribute(): ?string
    {
        if ($this->platform === 'youtube' && $this->youtube_id) {
            return "https://img.youtube.com/vi/{$this->youtube_id}/hqdefault.jpg";
        }

        if ($this->thumbnail) {
            return asset('storage/' . $this->thumbnail);
        }

        return null;
    }

    public function getPlatformIconAttribute(): string
    {
        return match ($this->platform) {
            'instagram' => 'fab fa-instagram',
            'tiktok'    => 'fab fa-tiktok',
            default     => 'fab fa-youtube',
        };
    }

    public function getPlatformLabelAttribute(): string
    {
        return match ($this->platform) {
            'instagram' => 'Instagram',
            'tiktok'    => 'TikTok',
            default     => 'YouTube',
        };
    }
}