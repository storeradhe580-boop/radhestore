<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('sliders', function (Blueprint $table) {
            // Add is_published column if it doesn't exist
            if (!Schema::hasColumn('sliders', 'is_published')) {
                $table->boolean('is_published')->default(true)->after('image');
            }
            
            // Add sort_order column if it doesn't exist
            if (!Schema::hasColumn('sliders', 'sort_order')) {
                $table->integer('sort_order')->default(0)->after('is_published');
            }
            
            // Add inset_image column if it doesn't exist
            if (!Schema::hasColumn('sliders', 'inset_image')) {
                $table->string('inset_image')->nullable()->after('image');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sliders', function (Blueprint $table) {
            if (Schema::hasColumn('sliders', 'is_published')) {
                $table->dropColumn('is_published');
            }
            if (Schema::hasColumn('sliders', 'sort_order')) {
                $table->dropColumn('sort_order');
            }
            if (Schema::hasColumn('sliders', 'inset_image')) {
                $table->dropColumn('inset_image');
            }
        });
    }
};
