<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    /* Cada evento pertenece
    a un movimiento*/
    public function movimiento()
    {
        # code...
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
        # code...
    }

    /* Cada evento es registrado por un usuario logueado */
    public function user()
    {
        # code...
    }

    /* Cada evento tiene
    una fase de movimiento*/
    public function fase_movimiento()
    {
        # code...
    }
}
