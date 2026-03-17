<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('mandal_members', function (Blueprint $table) {

            $table->string('relation')->nullable()->after('email');

            $table->text('contribution')->nullable()->after('relation');

            $table->text('message')->nullable()->after('contribution');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('mandal_members', function (Blueprint $table) {

            $table->dropColumn(['relation', 'contribution', 'message']);

        });
    }
};
