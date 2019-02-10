<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarifa extends Model
{
    protected $table = 'tar_tip_uni_cli';

    protected $fillable = ['LocId', 'TipUniId', 'TipSerId', 'TarTipUniCli', 'ObsTar'];

    protected $primaryKey = 'TarTipUniCliId';

    public function localidad()
    {
      return $this->belongsTo(Localidad::class,'LocId');
    }

    public function tipo_unidad()
    {
      return $this->belongsTo(TipoUnidad::class,'TipUniId');
    }

    public function tipo_servicio()
    {
      return $this->belongsTo(TipoServicio::class,'TipSerId');
    }
}
