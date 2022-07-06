<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')
                            ->get();

        return PostResource::collection($posts);
    }

    public function show($id)
    {
        $post = Post::orderBy('id')
                        ->findOrFail($id);

        return (new PostResource($post));
    }
}
