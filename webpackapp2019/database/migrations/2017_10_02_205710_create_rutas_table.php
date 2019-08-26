<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRutasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rutas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('nombre');
            $table->string('subtitulo');
            $table->string('departamento');
            $table->string('region');
            $table->string('tiempo');
            $table->string('dificultad');
            $table->string('clima');
            $table->string('relieve');
            $table->string('altura');
            $table->string('alojamiento');
            $table->string('precio');
            $table->string('extra');
            $table->text('descripcion');
            $table->text('text');
            $table->text('llegar');
            $table->string('avatar');
            $table->string('url');
            $table->decimal('precio_extra',9, 2);
            $table->integer('campo_hab');
            $table->integer('campo_fech');

            $table->integer('idEmprendedor')->unsigned();
            $table->foreign('idEmprendedor')->references('id')->on('emprendedor');

            $table->integer('estado');
            $table->integer('orden');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rutas');
    }
}
