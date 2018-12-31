<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PagoCxp extends Model
{
    /*Un pago pertenece a una factura*/
    public function factura()
    {
        # code...
    }
}
