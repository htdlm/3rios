<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adicional extends Model
{
    protected $table = 'adi';

    protected $fillable = ['DesAdi', 'UniAdi', 'CosAdi', 'ObsAdi'];

    protected $primaryKey = 'AdiId';

    /* Cada Adicional pertenece
    a un movimiento*/
    public function movimiento()
    {
        # code...
    }

    /* y/o a un evento*/
    public function evento()
    {
      return $this->belongsTo(Evento::class,'AdiId');
    }
}
