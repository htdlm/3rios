<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Operador;
use App\Clase;
use Session;

class OperadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $operadores = Operador::all();
         $clases=Clase::all();
         return view('Operador.index', compact('operadores','clases'));
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
         $operador = new Operador();
         $operador->fill($request->all());
         if ($operador->save()) {
             Session::flash('message', 'Operador agregado correctamente');
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
         return Operador::find($id);
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
         $operador = Operador::find($id);
         $operador->fill($request->all());
         if ($operador->save()) {
             Session::flash('message', 'Operador actualizado correctamente');
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
         Operador::destroy($id);

         Session::flash('message', 'Operador eliminado correctamente');
         Session::flash('class', 'success');

         return back();
     }
 }
