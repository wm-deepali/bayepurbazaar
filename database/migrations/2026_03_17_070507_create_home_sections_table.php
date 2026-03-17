<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('home_sections', function (Blueprint $table) {
            $table->id();

            $table->string('title')->nullable();
            $table->text('description')->nullable();

            $table->string('stat_1')->nullable();
            $table->string('stat_1_label')->nullable();

            $table->string('stat_2')->nullable();
            $table->string('stat_2_label')->nullable();

            $table->string('stat_3')->nullable();
            $table->string('stat_3_label')->nullable();

            $table->string('image')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('home_sections');
    }
};
