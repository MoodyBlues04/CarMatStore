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
        Schema::create('mat_place_templates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mat_place_template_info_id');
            $table->foreign('mat_place_template_info_id')
                ->references('id')
                ->on('mat_place_template_infos')
                ->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('template_prices', function (Blueprint $table) {
            $table->unsignedInteger('price');
            $table->foreignId('mat_place_template_id');
            $table->foreign('mat_place_template_id')
                ->references('id')
                ->on('mat_place_templates')
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
        Schema::dropIfExists('template_price');
        Schema::dropIfExists('mat_place_templates');
    }
};
