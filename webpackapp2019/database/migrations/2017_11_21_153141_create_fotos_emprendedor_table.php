<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFotosEmprendedorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fotos_emprendedor', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('url');
            $table->string('alt');

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
        Schema::dropIfExists('fotos_emprendedor');
    }
}
