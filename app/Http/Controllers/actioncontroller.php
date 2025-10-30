<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ActionController extends Controller
{
    public function like(Post $post)
    {
        $ip = request()->ip();
        $existing = $post->likes()->where('ip', $ip)->first();
        if ($existing) {
            $existing->delete();
            $liked = false;
        } else {
            $post->likes()->create(['ip' => $ip]);
            $liked = true;
        }
        return response()->json(['liked' => $liked, 'count' => $post->likes()->count()]);
    }

    public function comment(Request $request, Post $post)
    {
        $data = $request->validate([
            'username' => 'required|string|max:50',
            'body' => 'required|string|max:1000',
        ]);

        $comment = $post->comments()->create($data);
        return response()->json(['comment' => $comment]);
    }

    public function share(Request $request, Post $post)
    {
        $post->shares()->create(['provider' => $request->provider ?? 'manual']);
        return response()->json(['shared' => true]);
    }

    public function download(Post $post)
    {
        $post->downloads()->create(['ip' => request()->ip()]);
        if (!$post->attachment) abort(404);
        return response()->download(storage_path('app/public/' . $post->attachment));
    }
}

