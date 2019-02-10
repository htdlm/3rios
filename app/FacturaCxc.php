<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacturaCxc extends Model
{
    protected $table = 'fac_cxc';

    protected $fillable = ['FacCxcNum', 'MovId','ConFac', 'ObsFac', 'FecCreFac', 'FecFac', 'FecPre', 'ImpFac', 'IvaFac', 'SubFac', 'RetFac', 'TotFac','SalFac'];

    protected $primaryKey = 'FacCxcId';

    /*Cada factura se genera por
    un movimiento*/
    public function movimiento()
    {
        return $this->belongsTo(Movimiento::class,'MovId');
    }

    /*Cada factura genera uno o
    varios pagos */
    public function pagos()
    {
        # code...
    }
}
