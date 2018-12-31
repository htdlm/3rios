<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacturaCxp extends Model
{
    /*Cada factura se genera por
    un movimiento*/
    public function movimiento()
    {
        # code...
    }

    /*Cada factura genera uno o
    varios pagos */
    public function pagos()
    {
        # code...
    }
}
