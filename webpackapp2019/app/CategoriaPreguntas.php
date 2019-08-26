<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaPreguntas extends Model
{
    //
    protected $table = 'categorias_preguntas';
    protected $primary = 'id';
    protected $fillabel = [
    	'nombre','estado','icono'
    ];
}
