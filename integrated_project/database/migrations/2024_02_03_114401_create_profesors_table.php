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
         * Ésta tabla contiene información sobre cada profesor
         */
        Schema::create('profesors', function (Blueprint $table) {
            $table->id();
            $table->string('usu_seneca');   // 7 letras seguidas de 3 números
            $table->string('nombre');
            $table->string('apellido1');
            $table->string('apellido2');
            $table->string('especialidad'); // "FP" o "Secundaria", Se utiliza para saber qué módulos puede dar un profesor comparándolo con el campo especialidad del módulo
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profesors');
    }
};
