<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacturaCxp extends Model
{
    protected $table = 'fac_cxp';

    protected $fillable = ['FacCxpNum','MovId', 'ConFac', 'ObsFac', 'FecCreFac', 'FecFac', 'FecPre', 'ImpFac', 'IvaFac', 'SubFac', 'RetFac', 'TotFac', 'SalFac'];

    protected $primaryKey = 'FacCxpId';

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
