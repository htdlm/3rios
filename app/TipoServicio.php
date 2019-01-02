<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoServicio extends Model
{
    protected $table = 'tip_ser';

    protected $fillable = ['TipSer', 'ObsTipSer'];

    protected $primaryKey = 'TipSerId';

    /*Hay una reacion con tarifas
pero considero no es importante
poner la relacion*/
}
