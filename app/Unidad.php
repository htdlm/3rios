<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    //


    public function tipo_unidad()
    {
    	# code...
    }

    /*Relacion muchos a muchos
    tabla unidad_operador*/
    public function operadores()
    {
    	# code...
    }

    public function clase()
    {
    	# code...
    }

    /*Relacion muchos a muchos
    Tabla uni_ope_tra 
    Una unidad pertenece a un transportista */
    public function transportista()
    {
    	# code...
    }
}
