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
        Schema::table('workout_logs', function (Blueprint $table) {
            // Drop foreign key and the old workout_id column
            $table->dropForeign(['workout_id']);
            $table->dropColumn('workout_id');

            // Add a new column to track the workout date
            $table->date('workout_date')->after('user_id')->nullable(); // Add date for the workout session
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('workout_logs', function (Blueprint $table) {
            // Revert the changes by adding the workout_id back
            $table->foreignId('workout_id')->constrained()->onDelete('cascade');

            // Remove the newly added workout_date column
            $table->dropColumn('workout_date');
        });
    }
};