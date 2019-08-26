<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();

            $table->integer('cantidad');
            $table->date('fecha_llegada');
            $table->date('fecha_salida');
            $table->decimal('extras', 9, 2)->nullable();

            $table->string('nombre')->nullable();
            $table->string('apellidos')->nullable();
            $table->string('email')->nullable();
            $table->string('telefono')->nullable();
            $table->text('comentarios')->nullable();
            $table->boolean('estado');
            $table->decimal('precio_total', 10, 2)->nullable();   
            $table->string('descuento')->nullable();


            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('ruta_id')->unsigned();
            $table->foreign('ruta_id')->references('id')->on('rutas');

            $table->integer('precio_id')->unsigned();
            $table->foreign('precio_id')->references('id')->on('precios_opcional');

            $table->integer('habitacion_id')->unsigned();
            $table->foreign('habitacion_id')->references('id')->on('rutas_habitaciones');

            $table->integer('paquete_id')->unsigned();
            $table->foreign('paquete_id')->references('id')->on('rutas_paquetes');

            $table->decimal('precio_descuento', 9, 2)->nullable();
            $table->decimal('precio_persona', 9, 2)->nullable();
            $table->integer('cant_noche')->nullable();
            $table->decimal('precio_habitacion', 9, 2)->nullable();
            $table->string('tipo_habitacion')->nullable();
            $table->decimal('precio_paquete', 9, 2)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservas');
    }
}
