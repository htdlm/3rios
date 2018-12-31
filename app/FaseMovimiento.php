<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FaseMovimiento extends Model
{
    /* Cada fase pertenece a uno
    o varios movimientos  */
    public function movimientos()
    {
        # code...
    }

    /* Un evento necesita una
    fase de movimiento*/
    public function eventos()
    {
        # code...
    }
}
