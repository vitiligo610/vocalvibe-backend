<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('song_playlists')) {
            Schema::create('song_playlists', function (Blueprint $table) {
                $table->unsignedBigInteger('playlist_id');
                $table->unsignedBigInteger('song_id');
            });
        }

        Schema::table('song_playlists', function (Blueprint $table) {
            $table->foreign('playlist_id')->references('id')->on('playlists');
            $table->foreign('song_id')->references('id')->on('songs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('song_playlists');
    }
};
