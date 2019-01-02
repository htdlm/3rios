<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'cli';

    protected $fillable = ['NomCli', 'ConCli', 'LocCli', 'DirCli', 'TelCli', 'NexCli', 'EmaCli', 'RfcCli', 'DisCli', 'ObsCli'];

    protected $primaryKey = 'CliId';

    /* Depende del tipo de unidad, cada cliente
    tiene diferentes tarifas */
    public function tarifas()
    {
        # code...
    }

    /* Un mismo cliente tiene diferentes localidades */
    public function localidades()
    {
        # code...
    }
}
