<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('why_benefits', function (Blueprint $table) {
            $table->id();

            // Card content
            $table->string('title');
            $table->text('description')->nullable();

            // Icon (FontAwesome)
            $table->string('icon')->nullable(); 
            // example: fa-solid fa-bullhorn

            // Section type
            $table->enum('type', ['shopkeeper', 'customer']);

            // UI control
            $table->integer('sort_order')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('why_benefits');
    }
};