<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FaseMovimiento;
use Session;

class FaseMovimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $fasemovimientos = FaseMovimiento::all();
         return view('FaseMovimiento.index', compact('fasemovimientos'));
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
         $movimiento = new FaseMovimiento();
         $movimiento->fill($request->all());

         $movimiento->PriFas = ($request->input('PriFas')) ? true:false;

         if ($movimiento->save()) {
             Session::flash('message', 'Fase de Movimiento agregado correctamente');
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
         return FaseMovimiento::find($id);
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
         $movimiento = FaseMovimiento::find($id);
         $movimiento->fill($request->all());
         $movimiento->PriFas = ($request->input('PriFas')) ? true:false;
         if ($movimiento->save()) {
             Session::flash('message', 'Fase de Movimiento actualizado correctamente');
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
         FaseMovimiento::destroy($id);

         Session::flash('message', 'Fase de Movimiento eliminado correctamente');
         Session::flash('class', 'success');

         return back();
     }
   }
