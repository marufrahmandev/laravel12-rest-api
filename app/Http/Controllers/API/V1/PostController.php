<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return response()->json([
            'data' => $posts,
            'message' => 'Posts fetched  successfully',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = request()->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author_id' => 'required'
        ]);



        $post = Post::create($data);

        return response()->json([
            'data' => $post,
            'message' => 'Post created  successfully',
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        return response()->json([
            'data' => $post,
            'message' => 'Post fetched  successfully',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::find($id);
        $post->update($request->all());
        return response()->json([
            'data' => $post,
            'message' => 'Post updated  successfully',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        $post->delete();
        return response()->json([
            'message' => 'Post deleted  successfully',
        ]);
    }
}
