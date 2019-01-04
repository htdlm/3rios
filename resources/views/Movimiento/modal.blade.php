@extends('layouts.modal')
@section('titulo')
Nueva Localidad
@endsection
@section('body')
<form action="/Localidad/agregar" method="post" id="frmAgregar">
    {{csrf_field()}}
    <div class="row">
        <div class="col-lg-6">
            <label for="cliente">Cliente</label>
            <select class="form-control" name="CliId">
                @foreach ($clientes as $cliente)
                <option value="{{$cliente->CliId}}">{{$cliente->NomCli}}</option>
                @endforeach
            </select>

            <label for="descripcion">Descripcion</label>
            <input type="text" class="form-control" placeholder="Descripcion del lugar" name="DesLoc" value="{{old('DesLoc')}}">

            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" placeholder="Nombre de la localidad" name="NomLoc" value="{{old('NomLoc')}}">

            <label for="contacto">¿Persona de Contacto?</label>
            <input type="text" class="form-control" placeholder="Nombre de contacto" name="ConLoc" value="{{old('ConLoc')}}">

            <label for="Telfono ">Telefono</label>
            <input type="number" class="form-control" placeholder="Telefono" name="TelLoc" value="{{old('TelLoc')}}">

            <label for="indicaciones">Indicaciones</label>
            <textarea class="form-control" placeholder="Indicaciones para llegar" name="IndLoc" value="{{old('IndLoc')}}"></textarea>
        </div>
        <div class="col-lg-6">
            <label for="Nextel">Nextel</label>
            <input type="text" class="form-control" name="NexLoc" value="{{old('NexLoc')}}" placeholder="Numero Nextel">

            <label for="direccion">Direccion</label>
            <input type="text" class="form-control" placeholder="Direccion" name="DirLoc" value="{{old('DirLoc')}}">

            <label for="email">Email</label>
            <input type="email" class="form-control" name="EmaLoc" value="{{old('EmaLoc')}}" placeholder="Correo electronico">

            <label for="rfc">RFC</label>
            <input type="text" class="form-control" placeholder="RFC" name="RfcLoc" value="{{old('RfcLoc')}}">

            <label for="distancia">Distancia</label>
            <input type="number" class="form-control" placeholder="Distancia en km" name="DisLoc" value="{{old('DisLoc')}}">

            <label for="observacion">Observacion</label>
            <textarea class="form-control" placeholder="Observaciones" name="ObsCli" value="{{old('ObsLoc')}}"></textarea>
        </div>
    </div>
    <input type="submit" class="btn btn-success btn-block btn-lg mt-4" value="Agregar" id="btnCrear">
</form>
@endsection
