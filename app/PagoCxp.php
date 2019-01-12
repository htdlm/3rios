<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PagoCxp extends Model
{
    protected $table = 'pag_cxp';

    protected $fillable = ['NumPag', 'FacCxpNum', 'MonPag', 'FecPag', 'RefPag', 'ObsPag'];

    protected $primaryKey = 'PagCxpId';

    /*Un pago pertenece a una factura
    PEndiente checar la relacion porque el campo FacCxpNum no es la
    llave primaria*/
    public function factura()
    {
        return $this->belongsTo(FacturaCxp::class,'FacCxpNum');
    }
}
