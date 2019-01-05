<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'eve';

    protected $fillable = ['MovId', 'RefCli','FecAct', 'FecCreEve',
    'FecSol', 'FecRea', 'FasMovId', 'ObsEve', 'AdiId',
     'UseId', 'SemAct', 'SemSol', 'SemRea'];

    protected $primaryKey = 'EveId';

    /* Cada evento pertenece
    a un movimiento*/
    public function movimiento()
    {
      return $this->belongsTo(Movimiento::class,'MovId');
    }

    /* Codigo con el que el cliente encuentra
    su pedido */
    public function referencia_cliente()
    {
        # code...
    }

    /* Por si cada evento genera un adicional*/
    public function adicional()
    {
        return $this->belongsTo(Adicional::class,'AdiId');
    }

    /* Cada evento es registrado por un usuario logueado */
    public function user()
    {
        return $this->belongsTo(User::class,'UseId');
    }

    /* Cada evento tiene
    una fase de movimiento*/
    public function fase_movimiento()
    {
      return $this->belongsTo(FaseMovimiento::class,'FasMovId');
    }
}
