<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRutasAtractivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rutas_atractivos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('idRutas')->unsigned();
            $table->integer('idAtractivos')->unsigned();

            $table->foreign('idRutas')->references('id')->on('rutas');
            $table->foreign('idAtractivos')->references('id')->on('atractivos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rutas_atractivos');
    }
}
