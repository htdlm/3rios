<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoUnidad;
use Session;

class TipoUnidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $tipounidades=TipoUnidad::all();
          return view('tipounidad.index',compact('tipounidades'));
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
      $tipounidad = new TipoUnidad();
      $tipounidad->fill($request->all());
      if ($tipounidad->save()) {
          Session::flash('message', 'Tipo de Unidad agregada correctamente');
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
      return TipoUnidad::find($id);
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
      $tipounidad = TipoUnidad::find($id);
      $tipounidad->fill($request->all());
      if ($tipounidad->save()) {
          Session::flash('message', 'Tipo de unidad actualizado correctamente');
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
      TipoUnidad::destroy($id);

      Session::flash('message', 'Tipo unidad eliminada correctamente');
      Session::flash('class', 'success');

      return back();
    }
}
