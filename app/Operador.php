<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operador extends Model
{
    protected $table = 'ope';

    protected $fillable = ['DesOpe', 'NomOpe', 'DirOpe', 'TelOpe', 'EmaOpe', 'NexOpe', 'NssOpe', 'ConEmeOpe', 'TelEmeOpe', 'ObsOpe', 'ClaId'];

    protected $primaryKey = 'OpeId';

    public function transportista()
    {
        # code...
    }

    public function unidades()
    {
        # code...
    }

    public function clase()
    {
        # code...
    }

}
