<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transportista extends Model
{

    /*Relacion muchos a muchos
    Tabla uni_ope_tra
    Un transportista tiene varias unidades */
    public function unidades()
    {
        # code...
    }

    /* Un transportista tiene muchos operadores */
    public function operadores()
    {
        # code...
    }
}
