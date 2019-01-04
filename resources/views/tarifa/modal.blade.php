@extends('layouts.modal') @section('titulo') Nueva Tarifa @endsection @section('body')
<form action="Tarifa/agregar" method="post" id="frmAgregar">
    {{csrf_field()}}
    <div class="row">
        <div class="col-lg-12">
            <label for="cliente">Cliente</label>
            <select class="form-control" name="CliId">
                @foreach($clientes as $cliente)
                <option value="{{$cliente->CliId}}">{{$cliente->NomCli}}</option>
                @endforeach
            </select>

            <label for="tipounidad">Tipo de unidad</label>
            <select class="form-control" name="TipUniId">
                @foreach($tipounidades as $tipounidad)
                <option value="{{$tipounidad->TipUniId}}">{{$tipounidad->DesTipUni}}</option>
                @endforeach
            </select>

            <label for="tiposervicio">Tipo de servicio</label>
            <select class="form-control" name="TipSerId">
                @foreach($tiposervicios as $tiposervicio)
                <option value="{{$tiposervicio->TipSerId}}">{{$tiposervicio->TipSer}}</option>
                @endforeach
            </select>

            <label for="tarifas">Tarifa</label>
            <input type="number" class="form-control" placeholder="$ Tarifa" step="any" name="TarTipUniCli" value="{{old('TarTipUniCli')}}">

            <label for="observacion">Observacion</label>
            <textarea type="text" class="form-control" placeholder="Observaciones" name="ObsTar" value="{{old('ObsTar')}}"></textarea>

        </div>
    </div>
    <input type="submit" class="btn btn-success btn-block btn-lg mt-4" value="Agregar" id="btnCrear">
</form>
@endsection