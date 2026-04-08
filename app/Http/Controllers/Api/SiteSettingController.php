<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    /**
     * Return all site settings as a flat key=>value object.
     * Public – used by the frontend.
     */
    public function index()
    {
        return response()->json(SiteSetting::allAsMap());
    }

    /**
     * Update one or many settings at once.
     * Expects a JSON body like: { "cta_title": "...", "cta_background": "https://..." }
     * Protected by auth:sanctum via routes.
     */
    public function update(Request $request)
    {
        $data = $request->validate([
            'cta_title'                  => 'sometimes|string|max:255',
            'cta_subtitle'               => 'sometimes|string|max:500',
            'cta_button_text'            => 'sometimes|string|max:100',
            'cta_background'             => 'sometimes|nullable|string',
            'projects_hero_title'        => 'sometimes|string|max:255',
            'projects_hero_subtitle'     => 'sometimes|string|max:255',
            'projects_hero_background'   => 'sometimes|nullable|string',
            'currency'                   => 'sometimes|string|in:KES,USD',
        ]);

        foreach ($data as $key => $value) {
            SiteSetting::set($key, $value);
        }

        return response()->json(['message' => 'Settings saved.', 'settings' => SiteSetting::allAsMap()]);
    }
}
