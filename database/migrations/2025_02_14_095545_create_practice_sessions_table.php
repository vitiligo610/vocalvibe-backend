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
        if (!Schema::hasTable('practice_sessions')) {
            Schema::create('practice_sessions', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('playlist_id');
                $table->timestamps();
            });
        }

        Schema::table('practice_sessions', function (Blueprint $table) {
            $table->foreign('playlist_id')->references('id')->on('playlists');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('practice_sessions');
    }
};
