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
        Schema::create('fichas', function (Blueprint $table) {
            $table->id();
            $table->string('fic_codigo');
            $table->date('fic_inicioLectiva');
            $table->date('fic_finLectiva');
            $table->date('fic_inicioProductiva');
            $table->date('fic_finProductiva');
            $table->string('fic_modalidad');
            $table->string('fic_jornada');
            $table->unsignedBigInteger('apr_idVocero')->nullable();
            $table->unsignedBigInteger('pro_id');
            $table->unsignedBigInteger('ins_id');
            $table->foreign('pro_id')->references('id')->on('programas');
            $table->foreign('ins_id')->references('id')->on('instructors');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fichas');
    }
};