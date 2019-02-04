@extends('layouts.modal') @section('titulo') Agregar Rol/Usuario @endsection @section('body')
<form action="/Usuario/agregar" method="post" id="frmAgregar">
    {{csrf_field()}}
    <div class="row">
        <div class="col-lg-12">
            <label for="usuarios">Usuarios Registrados</label>
            <select class="form-control" name="UseId">
                @foreach($usuarios as $usuario)
                <option value="{{$usuario->UseId}}">{{$usuario->name}} ({{$usuario->email}})</option>
                @endforeach
            </select>

            <label for="rol">Rol <span style="color:#FF0000;font-size: 15pt">*</span></label>
            <select class="form-control" required name="RolId">
                @foreach($roles as $rol)
                <option value="{{$rol->RolId}}">{{$rol->Rol}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <input type="submit" class="btn btn-primary btn-block btn-lg mt-4" value="Agregar" id="btnCrear">
</form>
@endsection
