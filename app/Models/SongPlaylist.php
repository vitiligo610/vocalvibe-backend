<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SongPlaylist extends Model
{
    protected $table = 'song_playlists';

    protected $fillable = [
        'playlist_id',
        'song_id',
    ];

    public function song(): HasOne
    {
        return $this->hasOne(Song::class, 'id', 'song_id');
    }

    public function playlist(): HasOne
    {
        return $this->hasOne(Playlist::class, 'id', 'playlist_id');
    }
}
