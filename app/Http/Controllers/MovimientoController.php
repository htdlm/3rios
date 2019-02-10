<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use Mail;
use App\Movimiento;
use App\FaseMovimiento;
use App\Adicional;
use Session;
use App\Localidad;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ReporteMovimientoExport;

class MovimientoController extends Controller
{
    protected $correo='';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $movimientos=Movimiento::all();
      return view('Movimiento.index',compact('movimientos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $clientes=Cliente::all();
      $fases=FaseMovimiento::all();
      $adicionales=Adicional::all();
      return view('Movimiento.crear',compact('clientes','fases','adicionales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function excel($id)
    {
      return (new ReporteMovimientoExport($id))->download('Servicio.xlsx');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      return $request;
      $movimiento=new Movimiento();
      $movimiento->fill($request->all());

      //Id del usuario que realizo el movimiento
      $movimiento->UseId1=Auth()->user()->UseId;
      /*Antes de guardar validar que los kilos y el transporte
      coincidan, sino regresar un mensaje*/

      if($movimiento->save()){
        Session::flash('message','Movimiento agregado correctamente');
        Session::flash('class','success');
      }else{
        Session::flash('message','Algo salio mal');
        Session::flash('class','danger');
      }

      /*Email al que se mandara la info del Servicio*/
      $this->correo=Localidad::find($request->CliLocId)->EmaLoc;
      try{
        if($this->correo!=''){
            $data=array(
              'fecha' => $request->FecCre,
              'localidad'=>Localidad::find($request->CliLocId),
              'referencia'=>$request->RefCli
            );

            /*Mandar Mail*/
            Mail::send('Movimiento.email',$data,function($message){
              $message->from('3RiosLogistica@gmail.com','3Rios Logistica');
              $message->to($this->correo)->subject('Nuevo Servicio 3Rios');
            });
        }
    }catch(Exception $e){
      Session::flash('message','Servicio agregado. Posible email incorrecto');
      Session::flash('class','warning');
    }

      return back();
    }

    public function email(Request $request)
    {
      /*Mandar Mail*/
      $data=array(
        'data'=> 'Email enviado',
      );

      Mail::send('Movimiento.email',$data,function($message){
        $message->from('3RiosLogistica@gmail.com','3Rios Servicio');
        $message->to('adrian.cruz.islas@gmail.com')->subject('Test de email');
      });
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      return Movimiento::find($id);
    }

    public function getImporte($id)
    {
      return Movimiento::find($id)->FacTarTot;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clientes=Cliente::all();
        $movimiento=Movimiento::find($id);
        $movimiento=$movimiento->MovId;
        $fases=FaseMovimiento::all();
        $adicionales=Adicional::all();
        return view('Movimiento.crear',compact('movimiento','clientes','fases','adicionales'));
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
      $movimiento=Movimiento::find($id);
      $movimiento->fill($request->all());

      //Id del usuario que realizo el movimiento
      $movimiento->UseId1=Auth()->user()->UseId;

      /*Antes de guardar validar que los kilos y el transporte
      coincidan, sino regresar un mensaje*/
      if($movimiento->save()){
        Session::flash('message','Movimiento actualizado correctamente');
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
      Movimiento::destroy($id);

      Session::flash('message', 'Movimiento eliminado correctamente');
      Session::flash('class', 'success');

      return back();
    }
}
