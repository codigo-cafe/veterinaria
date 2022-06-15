<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtencionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atenciones', function (Blueprint $table) {
            $table->bigIncrements('id_aten');
            $table->date('fech_aten')->nullable();
            $table->text('tipo_aten', 100);
            $table->decimal('peso_aten', 8, 2);
            $table->integer('temp_aten');
            $table->text('descrip_aten', 100);
            $table->text('obtencion_masc', 100);
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
        Schema::dropIfExists('atenciones');
    }
}
