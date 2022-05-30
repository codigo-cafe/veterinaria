<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements("id_clie");
            $table->string('cedula_clie', 15);
            $table->string('nom_clie', 50);
            $table->string('ape_clie', 50);
            $table->text('ocupacion_clie', 50);
            $table->text('direccion_clie', 50);
            $table->string('sexo_clie', 50);
            $table->integer('edad_clie');
            $table->string('correo_clie')->unique();
            $table->string('celular_clie', 20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
