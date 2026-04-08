<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->integer('living_rooms')->default(0);
            $table->integer('garages')->default(0);
            $table->integer('dining_areas')->default(0);
            $table->integer('gym_areas')->default(0);
            $table->boolean('has_garden')->default(false);
            $table->boolean('has_parking')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropColumn(['living_rooms', 'garages', 'dining_areas', 'gym_areas', 'has_garden', 'has_parking']);
        });
    }
};
