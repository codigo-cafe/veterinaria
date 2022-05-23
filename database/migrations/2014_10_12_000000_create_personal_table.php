<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal', function (Blueprint $table) {
            $table->id();
            $table->string('cedula_per', 15);
            $table->string('nom_per', 50);
            $table->string('ape_per', 50);
            $table->text('dir_per', 50);
            $table->string('celular_per', 20);
            $table->string('correo_per')->unique();
            $table->string('contrasena_per');
            $table->string('sexo_per', 50);
            $table->integer('edad_per');
            $table->date('fecnac_per')->nullable();
            $table->date('fecinicio_per')->nullable();
            $table->date('fecfinal_per')->nullable();
            $table->text('cargo_per', 50);
            $table->text('profe_per', 50);
            $table->rememberToken();
            $table->string('profile_photo_path', 2048)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal');
    }
};
