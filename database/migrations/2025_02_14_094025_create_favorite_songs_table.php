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
        if (!Schema::hasTable('favorite_songs')) {
            Schema::create('favorite_songs', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('song_id');
            });
        }

        Schema::table('favorite_songs', function (Blueprint $table) {
            $table->foreign('song_id')->references('id')->on('songs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favorite_songs');
    }
};
