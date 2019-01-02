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
        # code...
    }

    public function tipo_unidad()
    {
        # code...
    }

    public function tipo_servicio()
    {
        # code...
    }
}
