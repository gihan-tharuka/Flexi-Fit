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
        Schema::table('users', function (Blueprint $table) {
            // Add membership_id column if it doesn't exist
            $table->unsignedBigInteger('membership_id')->nullable()->after('id');

            // Add foreign key constraint
            $table->foreign('membership_id')
                ->references('id')
                ->on('membership_plans')
                ->onDelete('set null'); // If membership plan is deleted, set membership_id to null
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
