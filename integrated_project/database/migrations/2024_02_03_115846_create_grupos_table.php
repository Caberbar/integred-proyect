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
         * Ésta tabla contiene información de cada grupo de alumnos. 
         * Ejs: "DAWB", "1º ESO C", etc.
         */
        Schema::create('grupos', function (Blueprint $table) {
            $table->id();
            $table->string('denominacion'); // ----------------- Nombre completo
            $table->string('turno'); // ------------------------ "Mañana" o "Tarde"
            $table->string('curso_escolar'); // ---------------- "2023/2024"
            $table->integer('curso'); // ----------------------- "1º", "2º", etc
            $table->foreignId('formacion_id')->constrained(); // ID de la formación que estudia el grupo
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grupos');
    }
};
