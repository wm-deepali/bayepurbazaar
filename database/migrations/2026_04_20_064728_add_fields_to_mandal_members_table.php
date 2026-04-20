<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('mandal_members', function (Blueprint $table) {

            // ✅ Mandal Category (relation)
            $table->foreignId('mandal_category_id')
                ->nullable()
                ->after('mandal_id')
                ->constrained()
                ->cascadeOnDelete();

            // ✅ New Fields (ONLY ADD)
            $table->string('father_name')->nullable()->after('name');
            $table->string('gender')->nullable()->after('father_name');

            $table->string('code')->nullable()->after('whatsapp');

            $table->text('address')->nullable()->after('code');

            $table->text('experience')->nullable()->after('address');
            $table->text('suggestion')->nullable()->after('experience');

            // ✅ State & City (IDs with FK)
            $table->foreignId('state_id')
                ->nullable()
                ->constrained('states')
                ->nullOnDelete();

            $table->foreignId('city_id')
                ->nullable()
                ->constrained('cities')
                ->nullOnDelete();

            $table->string('pin_code')->nullable()->after('city_id');
        });
    }

    public function down()
    {
        Schema::table('mandal_members', function (Blueprint $table) {

            // drop FK first
            $table->dropForeign(['mandal_category_id']);
            $table->dropForeign(['state_id']);
            $table->dropForeign(['city_id']);

            // drop columns
            $table->dropColumn([
                'mandal_category_id',
                'father_name',
                'gender',
                'code',
                'address',
                'experience',
                'suggestion',
                'state_id',
                'city_id',
                'pin_code'
            ]);
        });
    }
};