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
        return $this->belongsToMany(Unidad::class,'uni_ope','OpeId','UniId');
    }

    public function clase()
    {
        return $this->belongsTo(Clase::class,'ClaId');
    }

}
