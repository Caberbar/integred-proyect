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
         * Ésta tabla contiene las distintas formaciones en las que se pueden matricular los alumnos. 
         * Ejs: "DAW", "DAM", "ESO", "Bachillerato", etc.
         */
        Schema::create('formacions', function (Blueprint $table) {
            $table->id();
            $table->string('siglas');
            $table->string('denominacion'); // Nombre completo
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formacions');
    }
};
