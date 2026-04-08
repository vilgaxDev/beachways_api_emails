<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutSectionController extends Controller
{
    public function index()
    {
        $aboutSection = \App\Models\AboutSection::first();
        if (!$aboutSection) {
            $aboutSection = \App\Models\AboutSection::create([
                'title' => 'Today Sells Properties',
                'subtitle' => 'About Us',
                'description' => 'Houzez allow you to design unlimited panels and real estate custom forms to capture leads and keep record of all information',
                'list_items' => ['Live Music Cocerts at Luviana', 'Our SecretIsland Boat Tour is Just for You', 'Another List Item'],
                'stats_items' => [],
                'main_image' => null,
                'gallery_images' => []
            ]);
        }
        return response()->json($aboutSection);
    }

    public function store(Request $request)
    {
        $aboutSection = \App\Models\AboutSection::first() ?? new \App\Models\AboutSection();
        
        $data = $request->except(['main_image', 'gallery_images']);
        if ($request->has('list_items') && is_string($request->list_items)) {
            $data['list_items'] = json_decode($request->list_items, true);
        }
        if ($request->has('stats_items') && is_string($request->stats_items)) {
            $data['stats_items'] = json_decode($request->stats_items, true);
        }

        if ($request->hasFile('main_image')) {
            $path = $request->file('main_image')->store('about', 'public');
            $data['main_image'] = '/storage/' . $path;
        }

        if ($request->hasFile('gallery_images')) {
            $gallery = $aboutSection->gallery_images ?? [];
            foreach ($request->file('gallery_images') as $file) {
                $path = $file->store('about/gallery', 'public');
                $gallery[] = '/storage/' . $path;
            }
            $data['gallery_images'] = $gallery;
        }

        $aboutSection->fill($data);
        $aboutSection->save();

        return response()->json($aboutSection);
    }

    public function deleteGalleryImage(Request $request)
    {
        $aboutSection = \App\Models\AboutSection::first();
        if ($aboutSection && $request->has('image_url')) {
            $gallery = $aboutSection->gallery_images ?? [];
            $gallery = array_values(array_filter($gallery, function($url) use ($request) {
                return $url !== $request->image_url;
            }));
            $aboutSection->gallery_images = $gallery;
            $aboutSection->save();
        }
        return response()->json($aboutSection);
    }
}
