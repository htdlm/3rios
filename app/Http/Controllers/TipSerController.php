<?php

namespace App\Http\Controllers;

use App\TipoServicio;
use Illuminate\Http\Request;
use Session;

class TipSerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiposervicio = TipoServicio::all();
        return view('tiposervicio.index', compact('tiposervicio'));
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
        $tiposervicio = new TipoServicio();
        $tiposervicio->fill($request->all());
        if ($tiposervicio->save()) {
            Session::flash('message', 'Tipo de servicio agregado correctamente');
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
        return TipoServicio::find($id);
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
        $tiposervicio = TipoServicio::find($id);
        $tiposervicio->fill($request->all());
        if ($tiposervicio->save()) {
            Session::flash('message', 'Tipo de servicio actualizado correctamente');
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
        TipoServicio::destroy($id);

        Session::flash('message', 'Servicio eliminado correctamente');
        Session::flash('class', 'success');

        return back();
    }
}
