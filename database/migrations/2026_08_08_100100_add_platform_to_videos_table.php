<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('videos', function (Blueprint $table) {
            $table->string('platform')->default('youtube')->after('title');
            $table->string('thumbnail')->nullable()->after('youtube_id');
        });

        // youtube_url & youtube_id perlu boleh kosong karena sekarang
        // dipakai bersama untuk link video Instagram / TikTok juga.
        // Butuh package doctrine/dbal, jalankan dulu:
        // composer require doctrine/dbal
        Schema::table('videos', function (Blueprint $table) {
            $table->string('youtube_url')->nullable()->change();
            $table->string('youtube_id')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('videos', function (Blueprint $table) {
            $table->dropColumn(['platform', 'thumbnail']);
        });
    }
};