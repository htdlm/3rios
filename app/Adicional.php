<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adicional extends Model
{
    /* Cada Adicional pertenece
    a un movimiento*/
    public function movimiento()
    {
        # code...
    }

    /* y/o a un evento*/
    public function evento()
    {
        # code...
    }
}
