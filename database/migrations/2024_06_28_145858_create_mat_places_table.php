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
        Schema::create('mat_places', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('price');
            $table->foreignId('mat_tariff_id');
            $table->foreign('mat_tariff_id')
                ->references('id')
                ->on('mat_tariffs')
                ->onDelete('cascade');
            $table->foreignId('mat_place_info_id');
            $table->foreign('mat_place_info_id')
                ->references('id')
                ->on('mat_place_infos')
                ->onDelete('cascade');
            $table->foreignId('mat_id');
            $table->foreign('mat_id')
                ->references('id')
                ->on('mats')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mat_places');
    }
};
