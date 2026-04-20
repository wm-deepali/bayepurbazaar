<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up()
    {
        // ✅ STEP 1: column add (nullable first)
        Schema::table('mandals', function (Blueprint $table) {
            $table->unsignedBigInteger('mandal_category_id')->nullable()->after('id');
        });

        // ✅ STEP 2: ensure at least one category exists
        $categoryId = DB::table('mandal_categories')->value('id');

        if (!$categoryId) {
            $categoryId = DB::table('mandal_categories')->insertGetId([
                'name' => 'Default Category',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // ✅ STEP 3: update old records
        DB::table('mandals')->update([
            'mandal_category_id' => $categoryId
        ]);

        // ✅ STEP 4: make column NOT NULL
        Schema::table('mandals', function (Blueprint $table) {
            $table->unsignedBigInteger('mandal_category_id')->nullable(false)->change();
        });

        // ✅ STEP 5: add foreign key
        Schema::table('mandals', function (Blueprint $table) {
            $table->foreign('mandal_category_id')
                ->references('id')
                ->on('mandal_categories')
                ->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::table('mandals', function (Blueprint $table) {
            $table->dropForeign(['mandal_category_id']);
            $table->dropColumn('mandal_category_id');
        });
    }
};