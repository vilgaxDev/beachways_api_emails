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
        Schema::create('contact_submissions', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone', 20);
            $table->string('company');
            $table->text('message')->nullable();
            $table->string('package_type', 1); // A, B, C, D, E, F
            $table->string('package_name');
            $table->string('package_price');
            $table->text('package_description');
            $table->string('contact_number');
            $table->timestamp('submitted_at');
            $table->timestamps();
            
            // Indexes for better performance
            $table->index('email');
            $table->index('created_at');
            $table->index('package_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_submissions');
    }
};