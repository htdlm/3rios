@extends('layouts.modal')
@section('titulo')
Nuevo Tipo de Servicio
@endsection
@section('body')
<form action="/TipoServicio/agregar" method="post" id="frmAgregar">
	{{csrf_field()}}
	<label for="tiposervicio">Tipo de Servicio <span style="color:#FF0000;font-size: 15pt">*</span></label>
	<input type="text" class="form-control" required placeholder="Tipo de servicio" name="TipSer" value="{{old('TipSer')}}">
	<label for="tiposervicio">Observaciones</label>
	<textarea class="form-control" placeholder="Observacion" name="ObsTipSer" value="{{old('ObsTipSer')}}"></textarea>
	<input type="submit" class="btn btn-success btn-block btn-lg mt-4" value="Agregar" id="btnCrear">
</form>
@endsection
