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
         * Ésta tabla relaciona los profesores, con los modulos y los grupos.
         * Hay que tener en cuenta que varios profesores pueden dar la misma asignatura, por lo que puede haber
         * varias lecciones para cada módulo.
         */
        Schema::create('leccions', function (Blueprint $table) {
            $table->id();
            $table->string('horas'); // Horas que da éste profesor
            $table->foreignId('profesor_id')->constrained(); // ID del profesor que da esta parte de la asignatura
            $table->foreignId('modulo_id')->constrained(); // ID del modulo al que pertenece ésta leccion
            $table->foreignId('grupo_id')->constrained(); // ID del grupo que estudia esta leccion
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leccions');
    }
};
