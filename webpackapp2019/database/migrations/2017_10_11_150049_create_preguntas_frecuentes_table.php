<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreguntasFrecuentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preguntas_frecuentes', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->timestamps();

            $table->text('titulo');
            $table->text('descripcion');

            $table->integer('idcat')->unsigned();
            $table->foreign('idcat')->references('id')->on('categorias_preguntas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('preguntas_frecuentes');
    }
}
