<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('plan_mejoramiento', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('descripcion');
            $table->string('url_documento'); // Campo para almacenar la URL del documento
            $table->string('Area')->nullable();
            $table->date('Fecha_inicial')->nullable();
            $table->date('Fecha_final')->nullable();
            $table->string('Instructor_responsable')->nullable();
            $table->string('Objetivo_del_plan')->nullable();
            $table->string('Indicadores_de_desempeno')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('plan_mejoramiento');
    }
};
