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
        Schema::create('veiculos', function (Blueprint $table) {
            $table->id();                    // ID automático
            $table->string('marca');         // Marca do veículo
            $table->string('modelo');        // Modelo do veículo
            $table->year('ano');             // Ano do veículo (formato 4 dígitos)
            $table->string('cor')->nullable();    // Cor do veículo (pode ser nulo)
            $table->string('placa')->unique();    // Placa, deve ser única
            $table->timestamps();            // created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('veiculos');
    }
};
