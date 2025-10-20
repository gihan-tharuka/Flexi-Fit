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
        Schema::table('workout_log_details', function (Blueprint $table) {
            $table->dropColumn(['reps', 'weight']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('workout_log_details', function (Blueprint $table) {
            $table->integer('reps');
            $table->float('weight');
        });
    }
};
