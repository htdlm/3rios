<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClaStoreRequest;
use App\Clase;
use Session;

class ClaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
           $clases=Clase::all();
           return view('Clase.index',compact('clases'));
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
     public function store(ClaStoreRequest $request)
     {
       $clase = new Clase();
       $clase->fill($request->all());
       if ($clase->save()) {
           Session::flash('message', 'Clase agregada correctamente');
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
       return Clase::find($id);
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
     public function update(ClaStoreRequest $request, $id)
     {
       $clase = Clase::find($id);
       $clase->fill($request->all());
       if ($clase->save()) {
           Session::flash('message', 'Clase actualizada correctamente');
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
       Clase::destroy($id);

       Session::flash('message', 'Tipo unidad eliminada correctamente');
       Session::flash('class', 'success');

       return back();
     }
 }
