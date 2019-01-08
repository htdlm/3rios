@extends('layouts.modal') @section('titulo') Nueva Unidad @endsection @section('body')
<form action="Unidad/agregar" method="post" id="frmAgregar">
    {{csrf_field()}}
    <div class="row">
        <div class="col-lg-12">
            <label for="descripcion">Descripcion</label>
            <input type="text" class="form-control" placeholder="Unidad" name="DesUni" value="{{old('DesUni')}}">

            <label for="placa">Placas</label>
            <input type="text" class="form-control" placeholder="Numero de placa" name="PlaUni" value="{{old('PlaUni')}}">

            <label for="tipounidad">Tipo de unidad</label>
            <select class="form-control" name="TipUniId">
                @foreach($tipounidades as $tipounidad)
                <option value="{{$tipounidad->TipUniId}}">{{$tipounidad->DesTipUni}}</option>
                @endforeach
            </select>

            <label for="observacion">Observacion</label>
            <textarea class="form-control" placeholder="Observaciones" name="ObsUni" value="{{old('ObsUni')}}"></textarea>

            <label for="clase">Clase</label>
            <select class="form-control" name="ClaId">
                @foreach($clases as $clase)
                <option value="{{$clase->ClaId}}">{{$clase->DesCla}}</option>
                @endforeach
            </select>
            <hr>
            <label for="transportista">Transportista</label>
            <select class="form-control" name="TraId">
                <option value="0">Seleccione una opcion</option>
                @foreach($transportistas as $transportista)
                <option value="{{$transportista->TraId}}">{{$transportista->NomTra}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <input type="submit" class="btn btn-success btn-block btn-lg mt-4" value="Agregar" id="btnCrear">
</form>
@endsection
