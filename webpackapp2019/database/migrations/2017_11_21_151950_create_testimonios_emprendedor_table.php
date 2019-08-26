<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestimoniosEmprendedorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testimonios_emprendedor', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('nombre');
            $table->text('descripcion');
            $table->string('foto');

            $table->integer('idEmprendedor')->unsigned();
            $table->foreign('idEmprendedor')->references('id')->on('emprendedor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('testimonios_emprendedor');
    }
}
