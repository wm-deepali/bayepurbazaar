<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('listings', function (Blueprint $table) {

            $table->id();

            $table->foreignId('location_id')->constrained()->cascadeOnDelete();

            $table->foreignId('category_id')->constrained()->cascadeOnDelete();

            $table->foreignId('sub_category_id')->nullable()->constrained()->cascadeOnDelete();

            $table->string('business_name');

            $table->text('address')->nullable();

            $table->string('mobile');

            $table->string('email')->nullable();

            $table->string('whatsapp')->nullable();

            $table->text('short_description')->nullable();

            $table->text('services')->nullable();

            $table->string('working_hours')->nullable();

            $table->json('closed_days')->nullable();

            $table->string('website')->nullable();

            $table->boolean('status')->default(1);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('listings');
    }
};