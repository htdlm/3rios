@extends('layouts.modal') @section('titulo') Nuevo Operador @endsection @section('body')
<form action="Operador/agregar" method="post" id="frmAgregar">
	{{csrf_field()}}
	<div class="row">
		<div class="col-lg-6">
			<label for="Operador">Operador <span style="color:#FF0000;font-size: 15pt">*</span></label>
			<input type="text" class="form-control" required placeholder="Nombre del Operador" name="NomOpe" value="{{old('NomOpe')}}" autofocus="autofocus">

			<label for="Operador">Descripcion</label>
			<input type="text" class="form-control" placeholder="Descripcion del Operador" name="DesOpe" value="{{old('DesOpe')}}">

			<label for="direccion">Direccion</label>
			<input type="text" class="form-control" placeholder="Direccion" name="DirOpe" value="{{old('DirOpe')}}">

			<label for="email">Correo Electronico</label>
			<input type="email" class="form-control" placeholder="Correo Electronico" name="EmaOpe" value="{{old('EmaOpe')}}">

			<label for="telefono">Telefono <span style="color:#FF0000;font-size: 15pt">*</span></label>
			<input type="tel" class="form-control" placeholder="123 456 78" name="TelOpe" value="{{old('TelOpe')}}" minlength="8" maxlength="10">
			<small id="passwordHelpBlock" class="form-text text-muted">
				8 o 10 caracteres
			</small>

			<label for="nextel">Nextel</label>
			<input type="text" class="form-control" placeholder="Numero Nextel" name="NexOpe" value="{{old('NexOpe')}}">

		</div>
		<div class="col-lg-6">
			<label for="rfc">Seguro social</label>
			<input type="number" class="form-control" placeholder="Numero de Seguro Social" name="NssOpe" value="{{old('NssOpe')}}">

			<label for="clase">Clase <span style="color:#FF0000;font-size: 15pt">*</span></label>
			<select class="form-control" required name="ClaId">
				@foreach($clases as $clase)
				<option value="{{$clase->ClaId}}">{{$clase->DesCla}}</option>
				@endforeach
			</select>

			<label for="Localidad">Contacto de Emergencia</label>
			<input type="text" class="form-control" placeholder="Persona de contacto emergencia" name="ConEmeOpe" value="{{old('ConEmeOpe')}}">

			<label for="telefono">Telefono de emergencia</label>
			<input type="tel" class="form-control" placeholder="123 456 78" name="TelEmeOpe" value="{{old('TelEmeOpe')}}" minlength="8" maxlength="10">
			<small id="passwordHelpBlock" class="form-text text-muted">
				8 o 10 caracteres
			</small>

			<label for="observacion">Observacion</label>
			<textarea class="form-control" placeholder="Observaciones" name="ObsOpe" value="">{{old('ObsOpe')}}</textarea>

		</div>		
	</div>
	<input type="submit" class="btn btn-success btn-block btn-lg mt-4" value="Agregar" id="btnCrear">
</form>
@endsection
