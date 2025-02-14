<?php

use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\SongController;
use Illuminate\Support\Facades\Route;


Route::controller(SongController::class)
    ->prefix('songs')->group(function () {
        Route::get('/', 'index');
        Route::get('/{id}', 'show');
    });

Route::controller(PlaylistController::class)
    ->prefix('playlists')->group(function () {
        Route::get('/', 'index');
        Route::get('/{id}', 'show');
        Route::post('/', 'store');
        Route::put('/{id}', 'update');
        Route::delete('/{id}', 'destroy');
        Route::get('/{id}/add_song', 'add_song');
        Route::get('/{id}/remove_song', 'remove_song');
    });

