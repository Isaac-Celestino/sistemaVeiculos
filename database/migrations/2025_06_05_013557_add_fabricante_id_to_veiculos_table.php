<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFabricanteIdToVeiculosTable extends Migration
{
    public function up()
    {
        Schema::table('veiculos', function (Blueprint $table) {
            // Só cria a foreign key, sem tentar criar a coluna
            $table->foreign('fabricante_id')->references('id')->on('fabricantes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('veiculos', function (Blueprint $table) {
            $table->dropForeign(['fabricante_id']);
            // Não remove a coluna, porque já existe
        });
    }
}
