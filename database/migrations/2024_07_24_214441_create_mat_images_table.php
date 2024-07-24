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
        Schema::create('mat_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('image_id')
                ->constrained('images')
                ->onDelete('cascade');
            $table->foreignId('inner_color_id')
                ->constrained('colors')
                ->onDelete('cascade');
            $table->foreignId('border_color_id')
                ->constrained('colors')
                ->onDelete('cascade');
            $table->foreignId('material_id')
                ->constrained('mat_materials')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mat_images');
    }
};
