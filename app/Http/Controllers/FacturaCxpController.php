<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FacturaCxp;
use App\Movimiento;
use App\Exports\FacturaCxpExport;
use Maatwebsite\Excel\Facades\Excel;
use Session;

class FacturaCxpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facturas=FacturaCxp::all();
        $movimientos=Movimiento::all();
        return view('FacturaCxp.index',compact('facturas','movimientos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }


    public function excel(Request $request)
    {
      return Excel::download(new FacturaCxpExport, 'FacturasCxp.xlsx');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $factura=new FacturaCxp();
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
        return FacturaCxp::find($id);
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
      $factura=FacturaCxp::find($id);
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
      FacturaCxp::destroy($id);

      Session::flash('message', 'Factura eliminada correctamente');
      Session::flash('class', 'success');

      return back();
    }
}
