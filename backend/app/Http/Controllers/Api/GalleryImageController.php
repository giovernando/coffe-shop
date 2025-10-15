<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\GalleryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GalleryImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = GalleryImage::query();

        // Filter by category if provided
        if ($request->has('category')) {
            $query->where('category', $request->category);
        }

        // Only show active images
        $query->where('active', true);

        $galleryImages = $query->orderBy('order')->orderBy('created_at', 'desc')->get();

        return response()->json($galleryImages);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'nullable|string|max:255',
            'image_path' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'order' => 'integer',
            'active' => 'boolean',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $galleryImage = GalleryImage::create($request->all());

        return response()->json($galleryImage, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(GalleryImage $galleryImage)
    {
        if (!$galleryImage->active) {
            return response()->json(['message' => 'Gallery image not found'], 404);
        }

        return response()->json($galleryImage);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GalleryImage $galleryImage)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'nullable|string|max:255',
            'image_path' => 'sometimes|required|string|max:255',
            'category' => 'nullable|string|max:255',
            'order' => 'integer',
            'active' => 'boolean',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $galleryImage->update($request->all());

        return response()->json($galleryImage);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GalleryImage $galleryImage)
    {
        $galleryImage->delete();

        return response()->json(['message' => 'Gallery image deleted successfully']);
    }
}
