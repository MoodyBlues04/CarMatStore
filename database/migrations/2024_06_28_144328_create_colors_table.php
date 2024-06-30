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
            $table->string('hex');
            $table->timestamps();
        });

        Schema::create('tariffs_colors', function (Blueprint $table) {
            $table->foreignId('color_id');
            $table->foreign('color_id')
                ->references('id')
                ->on('colors')
                ->onDelete('cascade');
            $table->foreignId('mat_tariff_id');
            $table->foreign('mat_tariff_id')
                ->references('id')
                ->on('mat_tariffs')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tariffs_colors');
        Schema::dropIfExists('colors');
    }
};
