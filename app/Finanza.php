<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Finanza extends Model
{
    protected $table='fin';

    protected $fillable=['MovId','ImpFin','IvaFin','RetFin','TotFin'];

    protected $primaryKey='FinId';

    public function movimiento()
    {
      return $this->belongsTo(Movimiento::class,'MovId');
    }
}
