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
        Schema::create('colors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type', \App\Models\Color::TYPES);
            $table->foreignId('image_id');
            $table->foreign('image_id')
                ->references('id')
                ->on('images')
                ->onDelete('cascade');
            $table->foreignId('mat_tariff_id');
            $table->foreign('mat_tariff_id')
                ->references('id')
                ->on('mat_tariffs')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colors');
    }
};
