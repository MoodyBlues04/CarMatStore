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
        Schema::create('mat_materials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('tariffs_materials', function (Blueprint $table) {
            $table->foreignId('mat_material_id');
            $table->foreign('mat_material_id')
                ->references('id')
                ->on('mat_materials')
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
        Schema::dropIfExists('tariffs_materials');
        Schema::dropIfExists('mat_materials');
    }
};
