<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlianzasEmprendedorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alianzas_emprendedor', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->text('nombre');
            $table->text('url');
            $table->text('icono');

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
        Schema::dropIfExists('alianzas_emprendedor');
    }
}
