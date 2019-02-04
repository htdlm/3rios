@extends('layouts.modal')
@section('titulo')
Nueva Fase de Movimiento
@endsection
@section('body')
<form action="FaseMovimiento/agregar" method="post" id="frmAgregar">
    {{csrf_field()}}
    <div class="row">
        <div class="col-lg-12">
            <label for="fase">Fase de movimiento <span style="color:#FF0000;font-size: 15pt">*</span></label>
            <input type="text" class="form-control" required name="FasMov" value="{{old('FasMov')}}" placeholder="Fase de movimiento">

            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="PriFas" value="false">¿Privado?
                </label>
            </div>
            <label for="observacion">Observacion</label>
            <textarea class="form-control" placeholder="Observaciones" name="ObsFasMov" value="">{{old('ObsFasMov')}}</textarea>
        </div>
    </div>
    <input type="submit" class="btn btn-primary btn-block btn-lg mt-4" value="Agregar" id="btnCrear">
</form>
@endsection
