<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasUuids;

    protected $fillable = [
        'title',
        'description',
        'price',
        'location',
        'bedrooms',
        'bathrooms',
        'area',
        'image_urls',
        'status',
        'listing_type',
        'room_details',
        'floor_plans',
        'video_url',
        'is_featured',
        'show_floor_plans',
        'show_video',
        'is_project',
        'brochure_url',
        'show_brochure',
        'property_type',
        'total_units',
        'living_rooms',
        'garages',
        'dining_areas',
        'gym_areas',
        'has_garden',
        'has_parking',
        'background_image_url',
        'hero_title',
        'hero_subtitle',
    ];

    protected $casts = [
        'image_urls' => 'array',
        'room_details' => 'array',
        'floor_plans' => 'array',
        'price' => 'decimal:2',
        'area' => 'decimal:2',
        'is_featured' => 'boolean',
        'show_floor_plans' => 'boolean',
        'show_video' => 'boolean',
        'is_project' => 'boolean',
        'show_brochure' => 'boolean',
        'has_garden' => 'boolean',
        'has_parking' => 'boolean',
    ];
}
