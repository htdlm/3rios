<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{

    /* Hay 3 adicionales, checar si puedo
    hacer la consulta de los 3 en este mismo metodo */
    public function adicionales()
    {
        # code...
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
        # code...
    }

    /* Carga, descarga, etc.. */
    public function fase_movimiento()
    {
        # code...
    }

    /* Cada movimiento tiene como destino
    una localidad de un cliente */
    public function cliente_localidad()
    {
        # code...
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
        # code...
    }
}
