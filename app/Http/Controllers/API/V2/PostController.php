<?php

namespace App\Http\Controllers\API\V2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'message' => 'Posts fetched FROM V2 successfully',
            'data' => 'Posts FROM V2',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return response()->json([
            'message' => 'Post created FROM V2 successfully',
            'data' => $request->all(),
        ])->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json([
            'message' => 'Post fetched FROM V2 successfully',
            'data' => "Post \"$id\" fetched successfully",
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return response()->json([
            'message' => 'Post updated FROM V2 successfully',
            'data' => $request->all(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return response()->json([
            'message' => 'Post deleted FROM V2 successfully',
            'data' => "Post \"$id\" deleted successfully",
        ]);
    }
}
