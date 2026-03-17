<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();

            $table->string('menu_name'); // Terms & Conditions
            $table->string('slug')->unique();

            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();

            $table->longText('content'); // CKEditor HTML

            $table->boolean('status')->default(1);
            $table->boolean('show_in_menu')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};