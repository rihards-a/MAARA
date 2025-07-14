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
        Schema::create('diglegacy_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Links to the 'users' table
            $table->string('category'); // e.g., 'movies_series', 'music', 'data_storage'
            $table->string('service_name'); // e.g., 'Netflix', 'Spotify', 'Google One'
            $table->timestamps();

            // Add a unique constraint to prevent duplicate subscriptions for a user within a category
            $table->unique(['user_id', 'category', 'service_name'], 'user_category_service_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diglegacy_subscriptions');
    }
};