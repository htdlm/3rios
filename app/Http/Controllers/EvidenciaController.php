<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evidencia;
use App\Movimiento;
use Session;

class EvidenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $evidencias = Evidencia::all();
         $movimientos = Movimiento::all();
         /*CHECHAR la logica para que estando en un movimiento se agregue
         una evidencia y tomar automaticamente el id del movimiento*/
         return view('Evidencia.index', compact('evidencias','movimientos'));
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
         $evidencia = new Evidencia();
         $evidencia->fill($request->all());

          $file=$request->file('ArcEvi');
          $nombre = $file->getClientOriginalName();

          $evidencia->ArcEvi=$nombre;


         if ($evidencia->save()) {
           //Mover Archivo
           $file->move(public_path().'/evidencias_movimiento/movimiento '.$evidencia->MovId,$nombre);

             Session::flash('message', 'Evidencia agregada correctamente');
             Session::flash('class', 'success');
         } else {
             Session::flash('message', 'Algo salio mal');
             Session::flash('class', 'danger');
         }
         return back();

     }

     public function file($id)
     {
       $evidencia=Evidencia::find($id);

       if($evidencia!=null){
         $ruta= public_path()."\\evidencias_movimiento\\movimiento ".$evidencia->MovId."\\".$evidencia->ArcEvi;
         return response()->download($ruta);
       }else{
         Session::flash('message', 'No hay registros');
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
         return Evidencia::find($id);
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
         $evidencia = Evidencia::find($id);
         $evidencia->fill($request->all());
         if ($evidencia->save()) {
             Session::flash('message', 'Evidencia actualizada correctamente');
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
         Evidencia::destroy($id);

         Session::flash('message', 'Evidencia eliminada correctamente');
         Session::flash('class', 'success');

         return back();
     }
   }
