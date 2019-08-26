<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreguntaFrecuentes extends Model
{
    //
    protected $table = 'preguntas_frecuentes';
    protected $primarykey = 'id';
    protected $fillabel = [
    	'titulo','descripcion','idcat'
    ];

    public function categoria_pregunta(){
    	return $this->hasmany(CategoriaPreguntas::class);
    }
}
