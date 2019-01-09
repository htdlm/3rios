<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operador extends Model
{
    protected $table = 'ope';

    protected $fillable = ['DesOpe', 'NomOpe', 'DirOpe', 'TelOpe', 'EmaOpe', 'NexOpe', 'NssOpe', 'ConEmeOpe', 'TelEmeOpe', 'ObsOpe', 'ClaId'];

    protected $primaryKey = 'OpeId';

    public function transportistas()
    {
    //Si se usa, pendiente agregar parametros
        return $this->belongsToMany(UnidadOperadorTransportista::class,'uni_ope_tra');
    }

    public function clase()
    {
        return $this->belongsTo(Clase::class,'ClaId');
    }

}
