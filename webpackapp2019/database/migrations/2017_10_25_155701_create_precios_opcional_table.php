<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreciosOpcionalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('precios_opcional', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('opcion');
            $table->string('cantidad');
            $table->decimal('precio',9, 2);

            $table->integer('idRutas')->unsigned();
            $table->foreign('idRutas')->references('id')->on('rutas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('precios_opcional');
    }
}
