<?php

namespace App\Http\Controllers\Api;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Post;

class ApiController extends Controller
{
    public function posts(){
        return Post::all();
    }

    // Create a new post
    public function createPost(Request $request){
        // Validate the request data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string',
            'author_id' => 'required|exists:users,id',  // Assuming there's an 'author_id' field
        ]);

        // Create and save the new post
        $post = new Post();
        $post->title = $validated['title'];
        $post->slug = Str::slug($validated['title']);
        $post->author_id = $validated['author_id'];
        $post->body = 'pending';
        $post->status = 'DRAFT';
        $post->save();

        // Return the created post
        return response()->json([
            'message' => 'Post created successfully',
            'post' => $post
        ], 201);
    }
}