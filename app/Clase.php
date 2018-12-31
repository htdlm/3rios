<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    /*Una clase puede tener una o varias unidades*/
    public function unidades()
    {
        # code...
    }

    /*Una clase puede tener uno o varios operadores */
    public function operadores()
    {
        # code...
    }
}
