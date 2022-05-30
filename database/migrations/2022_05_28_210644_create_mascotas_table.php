<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMascotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mascotas', function (Blueprint $table) {
            $table->bigIncrements("id_masc");
            $table->string('nom_masc', 30);
            $table->string('raza_masc', 30);
            $table->string('sexo_masc', 30);
            $table->string('color_masc', 30);
            $table->date('fecnac_masc')->nullable();
            $table->integer('edad_masc');
            $table->string('espe_masc', 30);
            $table->double('peso_masc', 8, 3);
            $table->string('pelaje_masc', 30);
            $table->string('vivienda_masc', 30);
            $table->string('alimento_masc', 50);
            $table->foreignId('id_clie')->nullable()->references('id_clie')->on('clientes')->onDelete(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mascotas');
    }
}
