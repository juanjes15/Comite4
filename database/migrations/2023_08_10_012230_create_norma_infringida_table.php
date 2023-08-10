<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('norma_infringida', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sol_id')->constrained('solicitud_comites')->cascadeOnDelete();
            $table->foreignId('num_id')->constrained('numerals')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('norma_infringida');
    }
};