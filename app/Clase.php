<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    protected $table = 'cla';

    protected $fillable = ['DesCla', 'ObsCla'];

    protected $primaryKey = 'ClaId';

    /*Una clase puede tener una o varias unidades*/
    public function unidades()
    {
        return $this->hasMany(Unidad::class,'ClaId');
    }

    /*Una clase puede tener uno o varios operadores */
    public function operadores()
    {
        # code...
    }
}
