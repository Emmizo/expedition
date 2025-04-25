<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('safaris', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();  // For URL-friendly identifiers
            $table->text('description')->nullable();
            $table->string('image_path')->nullable();  // Path to an image
            // Add other fields as needed (e.g., country, duration, price)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('safaris');
    }
};
