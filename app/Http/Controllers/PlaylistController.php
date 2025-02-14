<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use App\Models\SongPlaylist;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PlaylistController extends APIConroller
{
    public function index(): JsonResponse
    {
        $playlists = Playlist::get();

        return $this->successResponse(compact('playlists'), 'Playlists fetched successfully');
    }

    public function show($id): JsonResponse
    {
        $playlist = Playlist::with('songs')->findOrFail($id);

        return $this->successResponse(compact('playlist'), 'Playlist fetched successfully');
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);

        $playlist = Playlist::create($validated);

        return $this->successResponse(compact('playlist'), 'Playlist created successfully');
    }

    public function update(Request $request, $id): JsonResponse
    {
        $validated = $request->validate([
            'id' => 'required|number|exists:playlists,id',
            'name' => 'string',
        ]);

        $playlist = Playlist::findOrFail($id);
        $playlist->update($validated);

        return $this->successResponse(compact('playlist'), 'Playlist updated successfully');
    }

    public function destroy($id): JsonResponse
    {
        $playlist = Playlist::findOrFail($id);
        $playlist->delete();

        return $this->successResponse([], 'Playlist deleted successfully');
    }

    public function add_song(Request $request, $id): JsonResponse
    {
        $validated = $request->validate([
            'song_id' => 'required|number|exists:songs,id',
        ]);

        $playlist_song = SongPlaylist::create([
            'playlist_id' => $id,
            'song_id' => $validated['song_id']
        ]);

        return $this->successResponse(compact('playlist_song'), 'Playlist song added successfully');
    }

    public function remove_song(Request $request, $id): JsonResponse
    {
        $validated = $request->validate([
            'song_id' => 'required|number|exists:songs,id',
        ]);

        $playlist_song = SongPlaylist::where('playlist_id', $id)
            ->andWhere('song_id', $validated['song_id']);

        $playlist_song->delete();

        return $this->successResponse(compact('playlist_song'), 'Playlist song removed successfully');
    }
}
