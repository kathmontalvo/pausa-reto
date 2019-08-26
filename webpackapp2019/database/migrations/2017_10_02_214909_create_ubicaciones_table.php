<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUbicacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ubicaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('direccion');
            $table->string('foto');
            $table->string('coord_top');
            $table->string('coord_left');
            $table->string('coord_rigth');
            $table->string('url_maps');

            $table->integer('idRutas')->unsigned();
            $table->foreign('idRutas')->references('id')->on('rutas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ubicaciones');
    }
}
