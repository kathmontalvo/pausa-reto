<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRutasHabitacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rutas_habitaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->decimal('precio',9, 2);

            $table->integer('ruta_id')->unsigned();
            $table->foreign('ruta_id')->references('id')->on('rutas');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rutas_habitaciones');
    }
}
