<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Localidad;
use App\Cliente;
use Session;

class LocalidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $localidades=Localidad::all();
      $clientes=Cliente::all();
      return view('Localidad.index',compact('localidades','clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $localidad=new Localidad();
        $localidad->fill($request->all());
        if ($localidad->save()) {
            Session::flash('message', 'Localidad agregada correctamente');
            Session::flash('class', 'success');
        } else {
            Session::flash('message', 'Algo salio mal');
            Session::flash('class', 'danger');
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
        return Localidad::find($id);
    }

    public function showLocalidades($idCliente)
    {
        return Localidad::where('CliId',$idCliente)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
      $localidad = Localidad::find($id);
      $localidad->fill($request->all());
      if ($localidad->save()) {
          Session::flash('message', 'Localidad actualizada correctamente');
          Session::flash('class', 'success');
      } else {
          Session::flash('message', 'Algo salio mal');
          Session::flash('class', 'danger');
      }
      return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Localidad::destroy($id);

      Session::flash('message', 'Localidad eliminada correctamente');
      Session::flash('class', 'success');

      return back();
    }
}
