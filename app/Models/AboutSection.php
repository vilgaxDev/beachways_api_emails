<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model
{
    protected $fillable = [
        'subtitle',
        'title',
        'description',
        'list_items',
        'stats_items',
        'main_image',
        'gallery_images',
        'testimonial',
        'testimonial_author',
        'button_text',
        'button_url',
    ];

    protected $casts = [
        'list_items' => 'array',
        'stats_items' => 'array',
        'gallery_images' => 'array',
    ];
}
