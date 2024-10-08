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
        Schema::create('mats', function (Blueprint $table) {
            $table->id();
            $table->string('model');
            $table->foreignId('mat_place_template_id');
            $table->foreign('mat_place_template_id')
                ->references('id')
                ->on('mat_place_templates')
                ->onDelete('cascade');
            $table->foreignId('bag_template_id');
            $table->foreign('bag_template_id')
                ->references('id')
                ->on('mat_place_templates')
                ->onDelete('cascade');
            $table->foreignId('brand_id');
            $table->foreign('brand_id')
                ->references('id')
                ->on('brands')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mats');
    }
};
