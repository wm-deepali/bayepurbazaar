<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mandal_members', function (Blueprint $table) {

            $table->id();

            $table->foreignId('mandal_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->string('name');

            $table->string('designation')->nullable();

            $table->string('mobile');

            $table->string('whatsapp')->nullable();

            $table->string('email')->nullable();

            $table->boolean('status')->default(1);

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mandal_members');
    }
};