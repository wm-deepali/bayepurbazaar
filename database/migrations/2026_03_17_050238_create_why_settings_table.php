<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('why_settings', function (Blueprint $table) {
            $table->id();

            // HERO
            $table->string('hero_title')->nullable();
            $table->text('hero_subtitle')->nullable();

            // SHOPKEEPER SECTION
            $table->text('shopkeeper_title')->nullable();
            $table->text('shopkeeper_description')->nullable();

            // CUSTOMER SECTION
            $table->text('customer_title')->nullable();
            $table->text('customer_description')->nullable();

            // CTA
            $table->string('cta_title')->nullable();
            $table->text('cta_description')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('why_settings');
    }
};