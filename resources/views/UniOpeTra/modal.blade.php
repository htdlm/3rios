@extends('layouts.modal') @section('titulo') Añadir Registro @endsection @section('body')
<form action="{{url('UniOpeTra/agregar')}}" method="post" id="frmAgregar">
    {{csrf_field()}}
    <div class="row">
        <div class="col-lg-12">
            <label for="unidad">Unidad</label>
            <select class="form-control" name="UniId">
                @foreach($unidades as $unidad)
                <option value="{{$unidad->UniId}}">{{$unidad->DesUni}}({{$unidad->PlaUni}})</option>
                @endforeach
            </select>

            <label for="operador">Operador</label>
            <select class="form-control" name="OpeId">
                <option value="0">Seleccione una opcion</option>
                @foreach($operadores as $operador)
                <option value="{{$operador->OpeId}}">{{$operador->NomOpe}}</option>
                @endforeach
            </select>

            <label for="transportista">Transportista <span style="color:#FF0000;font-size: 15pt">*</span></label>
            <select class="form-control" required name="TraId">
                @foreach($transportistas as $transportista)
                <option value="{{$transportista->TraId}}">{{$transportista->NomTra}}</option>
                @endforeach
            </select>

            <label for="costo">Costo</label>
            <input type="number" step="any" class="form-control" name="CosUniOpeTra" placeholder="$ Costo">

            <label for="Observaciones">Observaciones</label>
            <textarea name="ObsUniOpeTra" class="form-control" placeholder="Observaciones">{{old('ObsUniOpeTra')}}</textarea>
        </div>
    </div>
    <input type="submit" class="btn btn-success btn-block btn-lg mt-4" value="Agregar" id="btnCrear">
</form>
@endsection
