<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoUnidad extends Model
{
    protected $table = 'tip_uni';

    protected $fillable = ['DesTipUni', 'CapMinUni', 'CapMaxUni', 'ObsTipUni'];

    protected $primaryKey = 'TipUniId';

    //Puede no estar presente
    public function tarifas()
    {
        # code...
    }

    //Que unidades tienen este tipo de unidad
    public function unidades()
    {
        # code...
    }
}
