<?php

namespace App\Http\Controllers\Api;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\User;

class ApiController extends Controller
{

    public function users(){
        return User::all();
    }

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


      // Update an existing post
      public function updatePost(Request $request, $id){
        // Find the post by ID
        $post = Post::find($id);

        if (!$post) {
            return response()->json([
                'message' => 'Post not found'
            ], 404);
        }

        // Validate the request data
        $validated = $request->validate([
            'body' => 'sometimes|string',
            'seo_title' => 'sometimes|string',
            'meta_description' => 'sometimes|string',
            'meta_keywords' => 'sometimes|string',
            'status' => 'sometimes|string|in:DRAFT,PUBLISHED',
        ]);

        
        $post->body = $validated['body'];
        $post->status = $validated['status'];
        $post->category_id = 1;
        // $post->seo_title = $validated['seo_title'];
        // $post->meta_description = $validated['meta_description'];
        // $post->meta_keywords = $validated['meta_keywords'];
        $post->save();

        // Return the updated post
        return response()->json([
            'message' => 'Post updated successfully',
            'post' => $post
        ], 200);
    }
}