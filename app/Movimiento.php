<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{

    protected $table = 'mov';

    protected $fillable = ['FecCre', 'FecAct', 'FecSer', 'FecSol', 'FecRea',
    'FasMovId', 'CliLocId', 'RefCli', 'ObsMov', 'KilBru', 'KilNet', 'NumTar',
     'AdiId1','AdiValId1', 'AdiId2','AdiValId2', 'AdiId3','AdiValId3', 'UseId1',
     'SemSol','SemRea', 'SemSer','FacTar', 'FacTarTot','UniId'];

    protected $primaryKey = 'MovId';

    public function unidad()
    {
        return $this->belongsTo(Unidad::class,'UniId');
    }


    /* Hay 3 adicionales, checar si puedo
    hacer la consulta de los 3 en este mismo metodo */
    public function adicional1()
    {
        return $this->belongsTo(Adicional::class,'AdiId1');
    }

    public function adicional2()
    {
        return $this->belongsTo(Adicional::class,'AdiId2');
    }

    public function adicional3()
    {
        return $this->belongsTo(Adicional::class,'AdiId3');
    }

    /* Todas las evidencias del movimiento
    que se subieron en el transcurso del
    movimiento */
    public function evidencias()
    {
        # code...
    }

    /* Cada movimiento genera un registro de
    finanzas*/
    public function finanza()
    {
        # code...
    }

    /* Cada movimiento genera una factura
    por pagar */
    public function factura_cxp()
    {
        # code...
    }

    /* Cada movimiento genera una factura
    por cobrar */
    public function factura_cxc()
    {
        # code...
    }

    /* Parte importante de sistema
    Cada movimiento genera N eventos */
    public function eventos()
    {
        return $this->hasMany(Evento::class,'MovId');
    }

    /* Carga, descarga, etc.. */
    public function fase_movimiento()
    {
      return $this->belongsTo(FaseMovimiento::class,'FasMovId');
    }

    /* Cada movimiento tiene como destino
    una localidad de un cliente */
    public function cliente_localidad()
    {
      return $this->hasOne(Localidad::class,'LocId','CliLocId');
    }

    /* Parte importante, cada movimiento genera
    una referencia minigrip que tiene relacion
    con un evento CHECAR como funcionara esta parte
    ya que en ninguna tabla el campo es llave
    primaria*/
    public function referencia_cliente()
    {
        # code...
    }

    /* Cada movimiento lo genera un usuario */
    public function user()
    {
      return $this->belongsTo(User::class,'UseId1');
    }
}
