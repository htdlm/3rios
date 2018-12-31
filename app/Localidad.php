<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{

    /* Una localidad pertenece a un cliente*/
    public function cliente()
    {
        # code...
    }

    /* Hay una relacion de moviemientos
a localidades, pero creo que no es
necesaria marcarla aqui*/
}
