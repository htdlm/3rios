<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PagoCxp extends Model
{
    protected $table = 'fac_cxp';

    protected $fillable = ['NumPag', 'FacCxpNum', 'MonPag', 'FecPag', 'RefPag', 'ObsPag'];

    protected $primaryKey = 'PagCxpId';
    /*Un pago pertenece a una factura*/
    public function factura()
    {
        # code...
    }
}
