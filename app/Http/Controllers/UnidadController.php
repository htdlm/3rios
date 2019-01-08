<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unidad;
use App\TipoUnidad;
use App\Clase;
use App\Operador;
use App\Transportista;

use Session;

class UnidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
     {
           $unidades=Unidad::all();
           $tipounidades=TipoUnidad::all();
           $clases=Clase::all();

           $transportistas=Transportista::all();

           return view('unidad.index',compact('unidades','tipounidades','clases','transportistas'));
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
       $unidad = new Unidad();
       $unidad->fill($request->all());
       if ($unidad->save()) {
           Session::flash('message', 'Unidad agregada correctamente');
           Session::flash('class', 'success');
          if($request->input('TraId')!=0){
          //  $unidad->transportista()->attach($request->input('TraId'));
          }
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
       return Unidad::find($id);
     }

     public function showTipo($idTipo)
     {
       return Unidad::where('TipUniId',$idTipo)->get();
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
       $unidad = Unidad::find($id);
       $unidad->fill($request->all());
       if ($unidad->save()) {
           Session::flash('message', 'Tipo de unidad actualizado correctamente');
           Session::flash('class', 'success');
          if($request->input('TraId')!=0){
             //$unidad->transportista()->attach($request->input('TraId'));
           }
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
       Unidad::destroy($id);

       Session::flash('message', 'Unidad eliminado correctamente');
       Session::flash('class', 'success');

       return back();
     }
 }
