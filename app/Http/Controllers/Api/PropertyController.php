<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        $query = Property::query();

        if ($request->has('location')) {
            $query->where('location', 'like', '%' . $request->location . '%');
        }

        if ($request->has('listing_type')) {
            $query->where('listing_type', $request->listing_type);
        }

        if ($request->has('property_type')) {
            $query->where('property_type', $request->property_type);
        }

        if ($request->has('featured')) {
            $query->where('is_featured', true);
        }

        if ($request->has('is_project')) {
            $query->where('is_project', $request->boolean('is_project'));
        }

        return $query->orderBy('created_at', 'desc')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'location' => 'required|string',
            'bedrooms' => 'required|integer',
            'bathrooms' => 'required|integer',
            'area' => 'required|numeric',
            'image_urls' => 'nullable|array',
            'status' => 'required|string',
            'listing_type' => 'required|string|in:sale,rent',
            'room_details' => 'nullable|array',
            'floor_plans' => 'nullable|array',
            'video_url' => 'nullable|string',
            'is_featured' => 'nullable|boolean',
            'show_floor_plans' => 'nullable|boolean',
            'show_video' => 'nullable|boolean',
            'is_project' => 'nullable|boolean',
            'brochure_url' => 'nullable|string',
            'show_brochure' => 'nullable|boolean',
            'property_type' => 'nullable|string',
            'total_units' => 'nullable|integer',
            'living_rooms' => 'nullable|integer',
            'garages' => 'nullable|integer',
            'dining_areas' => 'nullable|integer',
            'gym_areas' => 'nullable|integer',
            'has_garden' => 'nullable|boolean',
            'has_parking' => 'nullable|boolean',
            'background_image_url' => 'nullable|string',
            'hero_title' => 'nullable|string',
            'hero_subtitle' => 'nullable|string',
        ]);

        $property = Property::create($validated);
        return response()->json($property, 201);
    }

    public function show(Property $property)
    {
        return $property;
    }

    public function update(Request $request, Property $property)
    {
        $validated = $request->validate([
            'title' => 'sometimes|string',
            'description' => 'sometimes|string',
            'price' => 'sometimes|numeric',
            'location' => 'sometimes|string',
            'bedrooms' => 'sometimes|integer',
            'bathrooms' => 'sometimes|integer',
            'area' => 'sometimes|numeric',
            'image_urls' => 'nullable|array',
            'status' => 'sometimes|string',
            'listing_type' => 'sometimes|string|in:sale,rent',
            'room_details' => 'nullable|array',
            'floor_plans' => 'nullable|array',
            'video_url' => 'nullable|string',
            'is_featured' => 'nullable|boolean',
            'show_floor_plans' => 'nullable|boolean',
            'show_video' => 'nullable|boolean',
            'is_project' => 'nullable|boolean',
            'brochure_url' => 'nullable|string',
            'show_brochure' => 'nullable|boolean',
            'property_type' => 'nullable|string',
            'total_units' => 'nullable|integer',
            'living_rooms' => 'nullable|integer',
            'garages' => 'nullable|integer',
            'dining_areas' => 'nullable|integer',
            'gym_areas' => 'nullable|integer',
            'has_garden' => 'nullable|boolean',
            'has_parking' => 'nullable|boolean',
            'background_image_url' => 'nullable|string',
            'hero_title' => 'nullable|string',
            'hero_subtitle' => 'nullable|string',
        ]);

        $property->update($validated);
        return $property;
    }

    public function destroy(Property $property)
    {
        $property->delete();
        return response()->noContent();
    }
}
