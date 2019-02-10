<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnidadOperador extends Model
{
    protected $table = 'uni_ope';

    protected $fillable = ['UniId', 'OpeId', 'ObsUniOpe'];

    protected $primaryKey = 'UniOpeId';

}
