<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    public function getAllPosts(){
        $posts = Post::all();
        return response()->json($posts);
    }

    public function show($id){
        $item = Post::findorFail($id);
        return response()->json($item);
    }
    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'title' => 'nullable|string|max:255',
        'content' => 'nullable|string',

    ]);

    $post = Post::create($validated);

    return response()->json([
        'message' => 'Created successfully.',
        'data' => $post
    ], 201);
}
}
