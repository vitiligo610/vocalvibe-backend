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
        if (!Schema::hasTable('practice_recordings')) {
            Schema::create('practice_recordings', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('practice_session_id');
                $table->string('filename');
                $table->timestamps();
            });
        }

        Schema::table('practice_recordings', function (Blueprint $table) {
            $table->foreign('practice_session_id')->references('id')->on('practice_sessions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('practice_recordings');
    }
};
