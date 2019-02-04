@extends('layouts.modal') @section('titulo') Nueva Tarifa @endsection @section('body')
<form action="Tarifa/agregar" method="post" id="frmAgregar">
    {{csrf_field()}}
    <div class="row">
        <div class="col-lg-12">
            <label for="Localidad">Localidad <span style="color:#FF0000;font-size: 15pt">*</span></label>
            <select class="form-control" required name="LocId">
                @foreach($localidades as $localidad)
                <option value="{{$localidad->LocId}}">{{$localidad->cliente->NomCli}} ({{$localidad->NomLoc}})</option>
                @endforeach
            </select>

            <label for="tipounidad">Tipo de unidad <span style="color:#FF0000;font-size: 15pt">*</span></label>
            <select class="form-control" required name="TipUniId">
                @foreach($tipounidades as $tipounidad)
                <option value="{{$tipounidad->TipUniId}}">{{$tipounidad->DesTipUni}}</option>
                @endforeach
            </select>

            <label for="tiposervicio">Tipo de servicio <span style="color:#FF0000;font-size: 15pt">*</span></label>
            <select class="form-control" required name="TipSerId">
                @foreach($tiposervicios as $tiposervicio)
                <option value="{{$tiposervicio->TipSerId}}">{{$tiposervicio->TipSer}}</option>
                @endforeach
            </select>

            <label for="tarifas">Tarifa <span style="color:#FF0000;font-size: 15pt">*</span></label>
            <input type="number" required class="form-control" placeholder="$ Tarifa" step="any" name="TarTipUniCli" value="{{old('TarTipUniCli')}}">

            <label for="observacion">Observacion</label>
            <textarea type="text" class="form-control" placeholder="Observaciones" name="ObsTar" value="">{{old('ObsTar')}}</textarea>

        </div>
    </div>
    <input type="submit" class="btn btn-primary btn-block btn-lg mt-4" value="Agregar" id="btnCrear">
</form>
@endsection
