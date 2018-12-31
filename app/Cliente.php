<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    /* Depende del tipo de unidad, cada cliente
    tiene diferentes tarifas */
    public function tarifas()
    {
        # code...
    }

    /* Un mismo cliente tiene diferentes localidades */
    public function localidades()
    {
        # code...
    }
}
