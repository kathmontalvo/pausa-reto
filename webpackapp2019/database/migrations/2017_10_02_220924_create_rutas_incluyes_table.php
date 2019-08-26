<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRutasIncluyesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rutas_incluyes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('idRutas')->unsigned();
            $table->integer('idIncluyes')->unsigned();

            $table->foreign('idRutas')->references('id')->on('rutas');
            $table->foreign('idIncluyes')->references('id')->on('incluyes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rutas_incluyes');
    }
}
