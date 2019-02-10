<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evento;
use Mail;
use App\Adicional;
use App\FaseMovimiento;
use App\Cliente;
use App\Movimiento;
use Session;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function indexMinigrip($id)
     {
       $fases=FaseMovimiento::all();
       $movimientos=Movimiento::where('RefCli','like','%'.$id.'%')->get();
       if(count($movimientos)==0){
         Session::flash('message','No hay registros con estos datos');
         Session::flash('class','warning');
         return back();
       }
       return view('Evento.index', compact('movimientos','fases'));
     }

    public function indexLocalidad($id)
    {
         $fases=FaseMovimiento::all();
         $movimientos=Movimiento::where('CliLocId',$id)->get();
         if(count($movimientos)==0){
           Session::flash('message','No hay registros con estos datos');
           Session::flash('class','warning');
           return back();
         }
       return view('Evento.index', compact('movimientos','fases'));
     }

     public function buscar()
     {
       $clientes=Cliente::all();
       return view('Evento.buscar',compact('clientes'));
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
      //@offsoleto
     public function store(Request $request)
     {
         $evento = new Evento();
         $evento->fill($request->all());


          //Traer el id de usuario de la sesion
          $evento->UseId=Auth()->user()->UseId;

         if ($evento->save()) {
             Session::flash('message', 'Evento agregado correctamente');
             Session::flash('class', 'success');
         } else {
             Session::flash('message', 'Algo salio mal');
             Session::flash('class', 'danger');
         }
         return back();
     }

     public function guardar(Request $request)
     {
       $evento = new Evento();
       $evento->fill($request->all());
       //return $evento;

      //Traer el id de usuario de la sesion
        $evento->UseId=Auth()->user()->UseId;


       if ($evento->save()) {
           Session::flash('message', 'Evento agregado correctamente');
           Session::flash('class', 'success');
       } else {
           Session::flash('message', 'Algo salio mal');
           Session::flash('class', 'danger');
       }

       /*Email al que se mandara la info del Servicio*/
       $movimiento=Movimiento::find($request->MovId);
       $this->correo=$movimiento->cliente_localidad->EmaLoc;
      try{
           if($this->correo!=''){
                $data=array(
                 'movimiento' => $movimiento,
               );

               /*Mandar Mail*/
               Mail::send('Evento.email',$data,function($message){
                 $message->from('3RiosLogistica@gmail.com','3Rios Logistica');
                 $message->to($this->correo)->subject('Nuevo evento agregado');
               });
           }
       }catch(Exception $e){
         Session::flash('message','Servicio agregado. Posible email incorrecto');
         Session::flash('class','warning');
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
         return Cliente::find($id);
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
         $evento = Cliente::find($id);
         $evento->fill($request->all());
         if ($evento->save()) {
             Session::flash('message', 'Cliente actualizado correctamente');
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
         Evento::destroy($id);

         Session::flash('message', 'Evento eliminado correctamente');
         Session::flash('class', 'success');

         return back();
     }
 }
