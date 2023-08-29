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
        Schema::create('solicitud_comites', function (Blueprint $table) {
            $table->id();
            $table->dateTime('sol_fecha');
            $table->string('sol_lugar');
            $table->string('sol_asunto');
            $table->string('sol_motivo');
            $table->string('sol_estado');
            $table->unsignedBigInteger('ins_id');
            $table->foreign('ins_id')->references('id')->on('instructors');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitud_comites');
    }
};