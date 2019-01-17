<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UnidadOperadorTransportista;
use App\Unidad;
use App\Transportista;
use App\Operador;

use Session;

class UniOpeTraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $registros=UnidadOperadorTransportista::all();
      $unidades=Unidad::all();
      $transportistas=Transportista::all();
      $operadores=Operador::all();
      return view('UniOpeTra.index',compact('registros','unidades','transportistas','operadores'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return UnidadOperadorTransportista::find($id);
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
        /*Buscar registro tabla pivote*/
        $registro=UnidadOperadorTransportista::find($id);
        $registro->fill($request->all());

        /*Si se va a actualizar buscar la unidad para
        actualizar el transportista*/
        $unidad=Unidad::find($registro->UniId);
        $unidad->TraId=$request->TraId;

        if ($registro->save()) {
          /*Actualizar la relacion de la unidad*/
            $unidad->save();

            Session::flash('message', 'Registro agregado correctamente');
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
        //
    }
}
