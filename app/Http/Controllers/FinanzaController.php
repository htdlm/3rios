<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Finanza;
use App\Movimiento;
use Session;

class FinanzaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $finanzas = Finanza::all();
         $movimientos=Movimiento::all();
         return view('Finanza.index', compact('finanzas','movimientos'));
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

       /* IMPORTANTE CHECAR LAS OPERACIONES PARA CALCULAR EL TOTAL ANTES DE GUARDAR*/
         $finanza = new Finanza();
         $finanza->fill($request->all());
         if ($finanza->save()) {
             Session::flash('message', 'Finanza agregada correctamente');
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
         return Finanza::find($id);
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
         $finanza = Finanza::find($id);
         $finanza->fill($request->all());
         if ($finanza->save()) {
             Session::flash('message', 'Finanza actualizada correctamente');
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
         Finanza::destroy($id);

         Session::flash('message', 'Finanza eliminada correctamente');
         Session::flash('class', 'success');

         return back();
     }
 }
