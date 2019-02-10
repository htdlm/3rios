@extends('layouts.modal') @section('titulo') Nueva Unidad @endsection @section('body')
<form action="Unidad/agregar" method="post" id="frmAgregar">
    {{csrf_field()}}
    <div class="row">
        <div class="col-lg-12">
            <label for="descripcion">Descripcion <span style="color:#FF0000;font-size: 15pt">*</span></label>
            <input type="text" class="form-control" required placeholder="Unidad" name="DesUni" value="{{old('DesUni')}}">

            <label for="placa">Placas <span style="color:#FF0000;font-size: 15pt">*</span></label>
            <input type="text" class="form-control" required placeholder="Numero de placa" name="PlaUni" value="{{old('PlaUni')}}">

            <label for="tipounidad">Tipo de unidad <span style="color:#FF0000;font-size: 15pt">*</span></label>
            <select class="form-control" required name="TipUniId">
                @foreach($tipounidades as $tipounidad)
                <option value="{{$tipounidad->TipUniId}}">{{$tipounidad->DesTipUni}}</option>
                @endforeach
            </select>

            <label for="clase">Clase</label>
            <select class="form-control" name="ClaId">
              @foreach($clases as $clase)
              <option value="{{$clase->ClaId}}">{{$clase->DesCla}}</option>
              @endforeach
            </select>

            <label for="observacion">Observacion</label>
            <textarea class="form-control" placeholder="Observaciones" name="ObsUni" value="">{{old('ObsUni')}}</textarea>

            <hr>
            <label for="transportista">Transportista <span style="color:#FF0000;font-size: 15pt">*</span></label>
            <select class="form-control" required name="TraId">
                @foreach($transportistas as $transportista)
                <option value="{{$transportista->TraId}}">{{$transportista->NomTra}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <input type="submit" class="btn btn-primary btn-block btn-lg mt-4" value="Agregar" id="btnCrear">
</form>
@endsection
