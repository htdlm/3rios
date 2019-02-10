<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PagoCxc;
use App\FacturaCxc;
use Session;

class PagoCxcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $pagos=PagoCxc::all();
         $facturas=FacturaCxc::all();
         return view('PagoCxc.index',compact('pagos','facturas'));
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
        if($request->FacCxcNum===0){
          Session::flash('message','No seleccionaste ninguna factura');
          Session::flash('class','danger');
          return back();
        }

         $factura=FacturaCxc::where('FacCxcNum',$request->FacCxcNum)->first();
         if($request->MonPag > $factura->SalFac){
           Session::flash('message','El pago es mayor al saldo pendiente, verifique.');
           Session::flash('class','warning');
           return back();
         }

         $pago=new PagoCxc();
         $pago->fill($request->all());

         if($pago->save()){
           Session::flash('message','Pago exitoso');
           Session::flash('class','success');

           //Actualizar el saldo de la factura
           $factura->SalFac -= $request->MonPag;
           $factura->save();
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
         return PagoCxc::find($id);
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
       $pago=PagoCxc::find($id);
       $pago->fill($request->all());
       /*
       Detalle, si se actualiza el monto del pago, se debe actualizar el saldo??
       */
       if($pago->save()){
         Session::flash('message','Pago Actualizado');
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
       PagoCxc::destroy($id);

       Session::flash('message', 'Pago eliminado correctamente');
       Session::flash('class', 'success');

       return back();
     }
   }
