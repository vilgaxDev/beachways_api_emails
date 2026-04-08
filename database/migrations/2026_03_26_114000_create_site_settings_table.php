<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->timestamps();
        });

        // Seed default values
        DB::table('site_settings')->insert([
            ['key' => 'cta_title',       'value' => 'Looking for a dream home?',       'created_at' => now(), 'updated_at' => now()],
            ['key' => 'cta_subtitle',    'value' => 'We can help you realize your dream of a new home', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'cta_button_text', 'value' => 'Explore Properties',              'created_at' => now(), 'updated_at' => now()],
            ['key' => 'cta_background',  'value' => '',                                  'created_at' => now(), 'updated_at' => now()],
            ['key' => 'projects_hero_title',    'value' => "Dream Living Space\nSetting New Standards", 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'projects_hero_subtitle', 'value' => 'Upcoming Projects',         'created_at' => now(), 'updated_at' => now()],
            ['key' => 'projects_hero_background', 'value' => '',                        'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
