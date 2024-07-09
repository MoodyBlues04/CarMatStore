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
        Schema::create('mat_place_template_infos', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('type')->default(\App\Models\MatPlaceTemplateInfo::TYPE_SALON);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mat_place_template_infos');
    }
};
