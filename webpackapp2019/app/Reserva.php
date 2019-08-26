<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = 'reservas';
    protected $primarykey = 'id';
    protected $fillabel = [
    	'cantidad','fecha_llegada','fecha_salida','extras','nombre','apellidos','email','telefono','comentarios','estado','precio_total','descuento','precio_descuento','user_id','ruta_id','precio_id','habitacion_id','paquete_id','precio_persona','cant_noche','precio_habitacion','tipo_habitacion','precio_paquete','utm_source'
    ];

    public function precioopcional()
    {
        return $this->belongsTo('App\PrecioOpcional');
    }
}
