<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('contact_submissions', function (Blueprint $table) {
        if (!Schema::hasColumn('contact_submissions', 'first_name')) {
            $table->string('first_name')->after('id');
        }
        if (!Schema::hasColumn('contact_submissions', 'last_name')) {
            $table->string('last_name')->after('first_name');
        }
        // Add other missing columns as needed
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contact_submissions', function (Blueprint $table) {
            //
        });
    }
};
