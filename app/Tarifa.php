<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarifa extends Model
{
    protected $table = 'tar_tip_uni_cli';

    protected $fillable = ['CliId', 'TipUniId', 'TipSerId', 'TarTipUniCli', 'ObsTar'];

    protected $primaryKey = 'TarTipUniCliId';

    public function cliente()
    {
      return $this->belongsTo(Cliente::class,'CliId');
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
