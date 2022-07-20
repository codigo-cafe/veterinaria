<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoTratamientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto_tratamiento', function (Blueprint $table) {
            $table->integer('id_pro')->unsigned();
            $table->integer('id_tra')->unsigned();
            $table->text('tiempo_tra');
            $table->integer('dosis_tra');
            $table->date('fecing_tra')->nullable();
            $table->date('fecfin_tra')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producto_tratamiento');
    }
}
