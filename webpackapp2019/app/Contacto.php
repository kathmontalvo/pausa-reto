<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    //
    protected $table = 'contactos';
    protected $primarykey = 'id';
    protected $fillable = [
    	'nombres','email','mensaje','pagina','mes','utm_source'
    ];
}