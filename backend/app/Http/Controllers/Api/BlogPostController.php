<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogPosts = BlogPost::where('published', true)
            ->orderBy('published_at', 'desc')
            ->get();

        return response()->json($blogPosts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blog_posts',
            'excerpt' => 'nullable|string|max:500',
            'content' => 'required|string',
            'image' => 'nullable|string|max:255',
            'author' => 'required|string|max:255',
            'published' => 'boolean',
            'published_at' => 'nullable|date',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $blogPost = BlogPost::create($request->all());

        return response()->json($blogPost, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogPost $blogPost)
    {
        if (!$blogPost->published) {
            return response()->json(['message' => 'Blog post not found'], 404);
        }

        return response()->json($blogPost);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BlogPost $blogPost)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'sometimes|required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blog_posts,slug,' . $blogPost->id,
            'excerpt' => 'nullable|string|max:500',
            'content' => 'sometimes|required|string',
            'image' => 'nullable|string|max:255',
            'author' => 'sometimes|required|string|max:255',
            'published' => 'boolean',
            'published_at' => 'nullable|date',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $blogPost->update($request->all());

        return response()->json($blogPost);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogPost $blogPost)
    {
        $blogPost->delete();

        return response()->json(['message' => 'Blog post deleted successfully']);
    }
}
