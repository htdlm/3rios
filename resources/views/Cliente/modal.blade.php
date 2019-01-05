@extends('layouts.modal')
@section('titulo')
Nuevo Cliente
@endsection
@section('body')
<form action="/Cliente/agregar" method="post" id="frmAgregar">
	{{csrf_field()}}
	<div class="row">
		<div class="col-lg-6">
			<label for="cliente">Cliente</label>
			<input type="text" class="form-control" placeholder="Nombre del cliente" name="NomCli" value="{{old('NomCli')}}">
			<label for="contacto">Contacto</label>
			<input type="text" class="form-control" placeholder="Persona de contacto" name="ConCli" value="{{old('ConCli')}}">
			<label for="email">Correo Electronico</label>
			<input type="email" class="form-control" placeholder="Correo Electronico" name="EmaCli" value="{{old('EmaCli')}}">
			<label for="Localidad">Localidad</label>
			<input type="text" class="form-control" placeholder="Localidad" name="LocCli" value="{{old('LocCli')}}">
			<label for="direccion">Direccion</label>
			<input type="text" class="form-control" placeholder="Direccion" name="DirCli" value="{{old('DirCli')}}">
		</div>
		<div class="col-lg-6">
			<label for="telefono">Telefono</label>
			<input type="number" class="form-control" placeholder="Telefono" name="TelCli" value="{{old('TelCli')}}">
			<label for="nextel">Nextel</label>
			<input type="text" class="form-control" placeholder="Numero Nextel" name="NexCli" value="{{old('NexCli')}}">
			<label for="rfc">RFC</label>
			<input type="text" class="form-control" placeholder="RFC" name="RfcCli" value="{{old('RfcCli')}}">
			<label for="distancia">Distancia</label>
			<input type="number" class="form-control" placeholder="Distancia en km" name="DisCli" value="{{old('DisCli')}}">
			<label for="observacion">Observacion</label>
			<textarea class="form-control" placeholder="Observaciones" name="ObsCli" value="{{old('ObsCli')}}"></textarea>
		</div>
		<hr>
	</div>
	<input type="submit" class="btn btn-success btn-block btn-lg mt-4" value="Agregar" id="btnCrear">
</form>
@endsection
