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
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image')->nullable(); // Assuming the image is optional
            //status: 0 = inactive, 1 = active
            $table->tinyInteger('status')->default(0);
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->text('description')->nullable(); // Assuming the description is optional
            //promo code is optional
            $table->string('promo_code')->nullable();
            $table->decimal('discount', 8, 2);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotions');
    }
};
