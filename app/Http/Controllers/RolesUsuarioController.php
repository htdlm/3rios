<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RolUsuario;
use App\User;
use App\Rol;
use Session;

class RolesUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registros=RolUsuario::all();
        $usuarios=User::all();
        $roles=Rol::all();
        return view('Usuario.index',compact('registros','usuarios','roles'));
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
        $usuario_rol=new RolUsuario();
        $usuario_rol->fill($request->all());

        if($usuario_rol->save()){
          Session::flash('message','Registro agregado correctamente');
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
        return RolUsuario::find($id);
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
      $usuario_rol=RolUsuario::find($id);
      $usuario_rol->fill($request->all());

      if($usuario_rol->save()){
        Session::flash('message','Registro actualizado correctamente');
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
      RolUsuario::destroy($id);

      Session::flash('message', 'Registro eliminado correctamente');
      Session::flash('class', 'success');

      return back();
    }
}
