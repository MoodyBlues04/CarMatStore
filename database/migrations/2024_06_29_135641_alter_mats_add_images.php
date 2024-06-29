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
        Schema::table('mats', function (Blueprint $table) {
            $table->foreignId('car_image_id');
            $table->foreign('car_image_id')
                ->references('id')
                ->on('images')
                ->onDelete('cascade');
        });

        Schema::create('mat_has_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mat_id');
            $table->foreign('mat_id')
                ->references('id')
                ->on('mats')
                ->onDelete('cascade');
            $table->foreignId('image_id');
            $table->foreign('image_id')
                ->references('id')
                ->on('images')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mat_has_images');
        Schema::table('mats', function (Blueprint $table) {
            $table->dropConstrainedForeignId('car_image_id');
        });
    }
};
