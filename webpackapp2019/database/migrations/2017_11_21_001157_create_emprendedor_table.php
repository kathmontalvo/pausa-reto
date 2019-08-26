<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmprendedorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emprendedor', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('nombre');
            $table->text('descripcion');
            $table->string('foto');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('instagram');
            $table->string('web');
            $table->string('url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emprendedor');
    }
}
