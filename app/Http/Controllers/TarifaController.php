<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\TipoServicio;
use App\TipoUnidad;
use App\Tarifa;
use Session;
class TarifaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
      {
            $tarifas=Tarifa::all();
            $clientes=Cliente::all();
            $tiposervicios=TipoServicio::all();
            $tipounidades=TipoUnidad::all();
            return view('tarifa.index',compact('tarifas','clientes','tiposervicios','tipounidades'));
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
        $tarifa = new Tarifa();
        $tarifa->fill($request->all());
        if ($tarifa->save()) {
            Session::flash('message', 'Tarifa agregada correctamente');
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
        return Tarifa::find($id);
      }

      public function showTipo($cliente,$tipo)
      {
        $tarifa=Tarifa::where('TipUniId',$tipo)->where('CliId',$cliente)->first();
        return $tarifa->TarTipUniCli;
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
        $tarifa = Tarifa::find($id);
        $tarifa->fill($request->all());
        if ($tarifa->save()) {
            Session::flash('message', 'Tarifa actualizado correctamente');
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
        Tarifa::destroy($id);

        Session::flash('message', 'Tarifa eliminada correctamente');
        Session::flash('class', 'success');

        return back();
      }
   }
