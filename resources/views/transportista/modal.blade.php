@extends('layouts.modal')
@section('titulo')
Nuevo Transportista
@endsection
@section('body')
<form action="Transportista/agregar" method="post" id="frmAgregar">
	{{csrf_field()}}
	<div class="row">
		<div class="col-lg-6">
			<label for="Transportista">Transportista</label>
			<input type="text" class="form-control" placeholder="Nombre del Transportista" name="NomTra" value="{{old('NomTra')}}">

			<label for="contacto">Contacto</label>
			<input type="text" class="form-control" placeholder="Persona de contacto" name="ConTra" value="{{old('ConTra')}}">

			<label for="direccion">Direccion</label>
			<input type="text" class="form-control" placeholder="Direccion" name="DirTra" value="{{old('DirTra')}}">

			<label for="email">Correo Electronico</label>
			<input type="email" class="form-control" placeholder="Correo Electronico" name="EmaTra" value="{{old('EmaTra')}}">

		</div>
		<div class="col-lg-6">
			<label for="telefono">Telefono</label>
			<input type="number" class="form-control" placeholder="Telefono" name="TelTra" value="{{old('TelTra')}}">

			<label for="nextel">Nextel</label>
			<input type="text" class="form-control" placeholder="Numero Nextel" name="NexTra" value="{{old('NexTra')}}">

			<label for="rfc">RFC</label>
			<input type="text" class="form-control" placeholder="RFC" name="RfcTra" value="{{old('RfcTra')}}">

			<label for="observacion">Observacion</label>
			<textarea class="form-control" placeholder="Observaciones" name="ObsTra" value="{{old('ObsTra')}}"></textarea>
		</div>
	</div>
	<input type="submit" class="btn btn-success btn-block btn-lg mt-4" value="Agregar" id="btnCrear">
</form>
@endsection
