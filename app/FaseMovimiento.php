<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FaseMovimiento extends Model
{
    protected $table = 'fas_mov';

    /*PriFas es booleano para saber si la
    fase de movimiento es privada o no*/
    protected $fillable = ['FasMov', 'PriFas', 'ObsFasMov'];

    protected $primaryKey = 'FasMovId';
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
