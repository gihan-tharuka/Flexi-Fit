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
        Schema::table('schedule_assignments', function (Blueprint $table) {

            // Adding a status column with default value as 'pending'
            $table->string('status')->default('pending')->after('schedule_id');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('schedule_assignments', function (Blueprint $table) {
            
            // Dropping the status column if the migration is rolled back
            $table->dropColumn('status');
        });
    }
};
