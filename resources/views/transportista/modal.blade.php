@extends('layouts.modal')
@section('titulo')
Nuevo Transportista
@endsection
@section('body')
<form action="Transportista/agregar" method="post" id="frmAgregar">
	{{csrf_field()}}
	<div class="row">
		<div class="col-lg-6">
			<label for="Transportista">Transportista <span style="color:#FF0000;font-size: 15pt">*</span></label>
			<input type="text" class="form-control" required placeholder="Nombre del Transportista" name="NomTra" value="{{old('NomTra')}}">

			<label for="contacto">Contacto</label>
			<input type="text" class="form-control" placeholder="Persona de contacto" name="ConTra" value="{{old('ConTra')}}">

			<label for="direccion">Direccion <span style="color:#FF0000;font-size: 15pt">*</span></label>
			<input type="text" class="form-control" required placeholder="Direccion" name="DirTra" value="{{old('DirTra')}}">

			<label for="email">Correo Electronico</label>
			<input type="email" class="form-control" placeholder="Correo Electronico" name="EmaTra" value="{{old('EmaTra')}}">

		</div>
		<div class="col-lg-6">
			<label for="telefono">Telefono <span style="color:#FF0000;font-size: 15pt">*</span></label>
			<input type="tel" required class="form-control" placeholder="123 456 78" name="TelTra" value="{{old('TelTra')}}" minlength="8" maxlength="10">
			<small id="passwordHelpBlock" class="form-text text-muted">
				8 o 10 caracteres
			</small>

			<label for="nextel">Nextel</label>
			<input type="text" class="form-control" placeholder="Numero Nextel" name="NexTra" value="{{old('NexTra')}}">

			<label for="rfc">RFC</label>
			<input type="text" class="form-control" placeholder="RFC" name="RfcTra" value="{{old('RfcTra')}}">

			<label for="observacion">Observacion</label>
			<textarea class="form-control" placeholder="Observaciones" name="ObsTra" value="">{{old('ObsTra')}}</textarea>
		</div>
	</div>
	<input type="submit" class="btn btn-primary btn-block btn-lg mt-4" value="Agregar" id="btnCrear">
</form>
@endsection
