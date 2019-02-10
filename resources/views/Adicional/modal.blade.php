@extends('layouts.modal')
@section('titulo')
Nuevo Adicional
@endsection
@section('body')
<form action="Adicional/agregar" method="post" id="frmAgregar">
    {{csrf_field()}}
    <div class="row">
        <div class="col-lg-12">
            <label for="descripcion">Descripcion <span style="color:#FF0000;font-size: 15pt">*</span> </label>
            <input type="text" class="form-control" required name="DesAdi" value="{{old('DesAdi')}}" placeholder="Descripcion del adicional">

            <label for="Unidad">Unidad <span style="color:#FF0000;font-size: 15pt">*</span> </label>
            <input type="text" class="form-control" required placeholder="Unidad a cobrar Hrs, Min, Mts, etc." name="UniAdi" value="{{old('UniAdi')}}">

            <label for="Costo">Costo <span style="color:#FF0000;font-size: 15pt">*</span></label>
            <input type="number" class="form-control" required step="any" placeholder="$ Costo del adicional" name="CosAdi" value="{{old('CosAdi')}}">

            <label for="observacion">Observacion</label>
            <textarea class="form-control" placeholder="Observaciones" name="ObsAdi" value="">{{old('ObsAdi')}}</textarea>
        </div>
    </div>
    <input type="submit" class="btn btn-primary btn-block btn-lg mt-4" value="Agregar" id="btnCrear">
</form>
@endsection
