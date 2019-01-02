<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnidadOperadorTransportista extends Model
{
    protected $table = 'uni_ope_tra';

    protected $fillable = ['TraId', 'UniId', 'OpeId', 'CosUniOpeTra', 'ObsUniOpeTra'];

    protected $primaryKey = 'UniOpeTraId';

    /* Tabla auxiliar para relacion de muchos a muchos
pendiente de checar relaciones */
}
