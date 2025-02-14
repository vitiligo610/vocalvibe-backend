<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    //
    use HasFactory;
    protected $table = 'songs';
    protected $fillable = [
        'artist_name',
        'song_name',
        'album_name',
        'genre',
        'difficulty',
    ];
}
