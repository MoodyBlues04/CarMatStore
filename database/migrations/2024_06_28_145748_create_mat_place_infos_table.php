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
        Schema::create('mat_place_infos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('mat_place_template_id');
            $table->foreign('mat_place_template_id')
                ->references('mat_place_templates')
                ->on('id')
                ->onDelete('cascade');
            
            $table->timestamps();

            $table->unique(['name', 'mat_place_template_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mat_place_infos');
    }
};
