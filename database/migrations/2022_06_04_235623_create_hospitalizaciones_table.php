<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospitalizacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospitalizaciones', function (Blueprint $table) {
            $table->bigIncrements('ficha_hosp');
            $table->date('fecing_hosp')->nullable();
            $table->date('fecfin_hosp')->nullable();
            $table->text('estado_hosp');
            $table->text('descrip_hosp');
            $table->text('signologia');
            $table->integer('temp_corp');
            $table->text('color_mucosa');
            $table->integer('palpa_abdominal');
            $table->text('piel');
            $table->integer('frecue_cardia');
            $table->foreignId('id_masc')->nullable()->references('id_masc')->on('mascotas')->onDelete(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hospitalizaciones');
    }
}
