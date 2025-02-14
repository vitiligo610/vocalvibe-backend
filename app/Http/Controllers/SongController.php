<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SongController extends APIConroller
{
    public function index(): JsonResponse
    {
        $songs = Song::get();

        return $this->successResponse(compact('songs'), 'Songs fetchd successfully');
    }

    public function show($id): JsonResponse
    {
        $song = Song::findOrFail($id);

        return $this->successResponse(compact('song'), 'Song fetched successfully');
    }
}
