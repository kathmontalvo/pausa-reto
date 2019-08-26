<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosEmprendedorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos_emprendedor', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->text('url_video');

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
        Schema::dropIfExists('videos_emprendedor');
    }
}
