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
        Schema::create('about_settings', function (Blueprint $table) {
            $table->id();

            // Hero Section
            $table->string('hero_title')->nullable();
            $table->text('hero_subtitle')->nullable();

            // About Section
            $table->string('about_title')->nullable();
            $table->string('about_image')->nullable();
            $table->longText('about_description')->nullable(); // 👈 HTML content

            // Vision, Mission, Objectives (HTML from editor)
            $table->longText('vision')->nullable();
            $table->longText('mission')->nullable();
            $table->longText('objectives')->nullable(); // 👈 HTML list

            // Founder
            $table->string('founder_name')->nullable();
            $table->longText('founder_description')->nullable();
            $table->longText('founder_quote')->nullable();
            $table->string('founder_image')->nullable();

            // Social Links
            $table->string('linkedin')->nullable();
            $table->string('instagram')->nullable();
            $table->string('whatsapp')->nullable();

            // CTA
            $table->string('cta_title')->nullable();
            $table->text('cta_description')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_settings');
    }
};
