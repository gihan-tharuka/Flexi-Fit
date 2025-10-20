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
        Schema::table('promotion_banners', function (Blueprint $table) {
            $table->tinyInteger('status')->default(1)->after('end_date')->comment('1=active, 0=inactive');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('promotion_banners', function (Blueprint $table) {
            //
        });
    }
};
