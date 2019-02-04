@extends('layouts.modal')
@section('titulo')
Nueva Localidad
@endsection
@section('body')
<form action="/Localidad/agregar" method="post" id="frmAgregar">
    {{csrf_field()}}
    <div class="row">
        <div class="col-lg-6">
            <label for="cliente">Cliente <span style="color:#FF0000;font-size: 15pt">*</span></label>
            <select class="form-control" required name="CliId">
                @foreach ($clientes as $cliente)
                <option value="{{$cliente->CliId}}">{{$cliente->NomCli}}</option>
                @endforeach
            </select>

            <label for="descripcion">Descripcion</label>
            <input type="text" class="form-control" placeholder="Descripcion del lugar" name="DesLoc" value="{{old('DesLoc')}}">

            <label for="nombre">Nombre <span style="color:#FF0000;font-size: 15pt">*</span></label>
            <input type="text" class="form-control" required placeholder="Nombre de la localidad" name="NomLoc" value="{{old('NomLoc')}}">

            <label for="contacto">¿Persona de Contacto? <span style="color:#FF0000;font-size: 15pt">*</span></label>
            <input type="text" class="form-control" required placeholder="Nombre de contacto" name="ConLoc" value="{{old('ConLoc')}}">

            <label for="Telfono ">Telefono <span style="color:#FF0000;font-size: 15pt">*</span></label>
            <input type="tel" class="form-control" required placeholder="123 456 78" name="TelLoc" value="{{old('TelLoc')}}" minlength="8" maxlength="10">

            <label for="indicaciones">Indicaciones <span style="color:#FF0000;font-size: 15pt">*</span></label>
            <textarea class="form-control" required placeholder="Indicaciones para llegar" name="IndLoc" value="{{old('IndLoc')}}"></textarea>
        </div>
        <div class="col-lg-6">
            <label for="Nextel">Nextel</label>
            <input type="text" class="form-control" name="NexLoc" value="{{old('NexLoc')}}" placeholder="Numero Nextel">

            <label for="direccion">Direccion <span style="color:#FF0000;font-size: 15pt">*</span></label>
            <input type="text" class="form-control" required placeholder="Direccion" name="DirLoc" value="{{old('DirLoc')}}">

            <label for="email">Email</label>
            <input type="email" class="form-control" name="EmaLoc" value="{{old('EmaLoc')}}" placeholder="Correo electronico">

            <label for="rfc">RFC</label>
            <input type="text" class="form-control" placeholder="RFC" name="RfcLoc" value="{{old('RfcLoc')}}">

            <label for="distancia">Distancia</label>
            <input type="number" class="form-control" placeholder="Distancia en km" name="DisLoc" value="{{old('DisLoc')}}">

            <label for="observacion">Observacion</label>
            <textarea class="form-control" placeholder="Observaciones" name="ObsLoc" value="">{{old('ObsLoc')}}</textarea>
        </div>
    </div>
    <input type="submit" class="btn btn-primary btn-block btn-lg mt-4" value="Agregar" id="btnCrear">
</form>
@endsection
