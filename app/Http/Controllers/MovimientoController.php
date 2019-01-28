<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Movimiento;
use App\FaseMovimiento;
use App\Adicional;
use Session;

class MovimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $movimientos=Movimiento::all();
      return view('Movimiento.index',compact('movimientos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $clientes=Cliente::all();
      $fases=FaseMovimiento::all();
      $adicionales=Adicional::all();
      return view('Movimiento.crear',compact('clientes','fases','adicionales'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $movimiento=new Movimiento();
      $movimiento->fill($request->all());

      //Id del usuario que realizo el movimiento
      $movimiento->UseId1=Auth()->user()->UseId;
      /*Antes de guardar validar que los kilos y el transporte
      coincidan, sino regresar un mensaje*/

      if($movimiento->save()){
        Session::flash('message','Movimiento agregado correctamente');
        Session::flash('class','success');
      }else{
        Session::flash('message','Algo salio mal');
        Session::flash('class','danger');
      }
      return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      return Movimiento::find($id);
    }

    public function getImporte($id)
    {
      return Movimiento::find($id)->FacTarTot;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clientes=Cliente::all();
        $movimiento=Movimiento::find($id);
        $movimiento=$movimiento->MovId;
        $fases=FaseMovimiento::all();
        $adicionales=Adicional::all();
        return view('Movimiento.crear',compact('movimiento','clientes','fases','adicionales'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Movimiento::destroy($id);

      Session::flash('message', 'Movimiento eliminado correctamente');
      Session::flash('class', 'success');

      return back();
    }
}
