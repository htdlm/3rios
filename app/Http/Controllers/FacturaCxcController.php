<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FacturaCxc;
use App\Movimiento;
use Session;

class FacturaCxcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $facturas=FacturaCxc::all();
         $movimientos=Movimiento::all();
         return view('FacturaCxc.index',compact('facturas','movimientos'));
     }

     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {

     }

     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(Request $request)
     {
         $factura=new FacturaCxc();
         $factura->fill($request->all());

         if($factura->save()){
           Session::flash('message','Factura creada con exito');
           Session::flash('class','success');
         }else{
           Session::flash('message','Algo salio mal');
           Session::flash('class','danger');
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
         return FacturaCxc::find($id);
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
       $factura=FacturaCxc::find($id);
       $factura->fill($request->all());

       if($factura->save()){
         Session::flash('message','Factura actualizada con exito');
         Session::flash('class','success');
       }else{
         Session::flash('message','Algo salio mal');
         Session::flash('class','danger');
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
       FacturaCxc::destroy($id);

       Session::flash('message', 'Factura eliminada correctamente');
       Session::flash('class', 'success');

       return back();
     }
 }
