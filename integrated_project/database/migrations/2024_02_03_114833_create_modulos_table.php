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
        /**
         * Ésta tabla contiene información sobre cada asignatura
         */
        Schema::create('modulos', function (Blueprint $table) {
            $table->id();
            $table->integer('horas'); // ----------------------- Horas semanales totales
            $table->string('denominacion'); // ----------------- Nombre completo
            $table->string('especialidad'); // ----------------- "FP" o "Secundaria"
            $table->string('siglas');
            $table->integer('curso'); // ----------------------- 1º, 2º o 3º, sin el "º"
            $table->foreignId('formacion_id')->constrained(); // ID de la formación en la que se da éste módulo
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modulos');
    }
};
