<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evidencia extends Model
{
    protected $table = 'evi';

    protected $fillable = ['NumEvi', 'DesEvi', 'FecPre', 'FecRet', 'ObsEvi', 'ArcEvi', 'MovId'];

    protected $primaryKey = 'EviId';

    /* Cada evidencia pertenece a un
    movimiento */
    public function movimiento()
    {
        return $this->belongsTo(Movimiento::class,'MovId');
    }
}
