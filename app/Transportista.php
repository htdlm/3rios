<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transportista extends Model
{
    protected $table = 'tra';

    protected $fillable = ['NomTra', 'ConTra', 'DirTra', 'TelTra', 'NexTra', 'EmaTra', 'RfcTra', 'ObsTra'];

    protected $primaryKey = 'TraId';
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
