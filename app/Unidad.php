<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    protected $table = 'uni';

    protected $fillable = ['DesUni', 'PlaUni', 'TipUniId', 'ObsUni','ClaId','TraId'];

    protected $primaryKey = 'UniId';

    public function tipo_unidad()
    {
        return $this->belongsTo(TipoUnidad::class,'TipUniId');
    }

    public function clase()
    {
        return $this->belongsTo(Clase::class,'ClaId');
    }

    /*Relacion muchos a muchos
    Tabla uni_ope_tra
    Una unidad pertenece a un transportista */
    public function transportista()
    {
        return $this->belongsToMany(Transportista::class,'uni_ope_tra','UniId','TraId');
    }
}
