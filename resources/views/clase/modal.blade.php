@extends('layouts.modal')
@section('titulo')
Nueva Clase
@endsection
@section('body')
<form action="Clase/agregar" method="post" id="frmAgregar">
	{{csrf_field()}}
	<div class="row">
		<div class="col-lg-12">
			<label for="descripcion">Descripcion <span style="color:#FF0000;font-size: 15pt">*</span></label>
			<input type="text" class="form-control" required placeholder="Nombre de la clase" name="DesCla" value="{{old('DesCla')}}">

			<label for="observacion">Observacion</label>
			<textarea class="form-control" placeholder="Observaciones" name="ObsCla" value="">{{old('ObsCla')}}</textarea>
		</div>
	</div>
	<input type="submit" class="btn btn-success btn-block btn-lg mt-4" value="Agregar" id="btnCrear">
</form>
@endsection
