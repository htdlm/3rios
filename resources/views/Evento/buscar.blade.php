@extends('layouts.app') @section('content')
<div class="row">
    <div class="col-lg-12">
        @if(Session::has('message'))
        <div class="alert alert-{{Session::get('class')}} alert-dismissable">
            <button type="button" class="close" data-dismiss="alert">&times;</button>{{Session::get('message')}}
        </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h2 class="text-center">Rastrear movimiento</h2>
            </div>
            <div class="card-body">
                <label for="Referencia">Codigo de Referencia Minigrip</label>
                <input class="form-control" type="text" name="RefCli" value="{{old('RefCli')}}" placeholder="Referencia Minigrip (Tiene prioridad sobre Cliente)">
                <small id="passwordHelpBlock" class="form-text text-muted">
                  Muestra solo el registro especificado
                </small>
                <br>
                <label for="cliente">Cliente</label>
                <select class="form-control" name="CliId">
                    @foreach($clientes as $cliente)
                    <option value="{{$cliente->CliId}}">{{$cliente->NomCli}}</option>
                    @endforeach
                </select>

                <label for="cliente">Localidad del cliente</label>
                <select class="form-control" name="CliLocId">
                    <!-- Se llena automaticamente-->
                </select>
                <small id="passwordHelpBlock" class="form-text text-muted">
                  Muestra todos los registros relacionados con la localidad del cliente seleccionado
                </small>
            </div>
            <div class="card-footer">
                <button type="button" name="button" class="btn btn-primary btn-lg btn-block" id="btnBuscar">BUSCAR</button>
            </div>
        </div>
    </div>
</div>
@endsection @section('scripts')
<script type="text/javascript" src="{{asset('js/evento/buscar.js')}}"></script>
<script type="text/javascript" src="{{asset('js/cargarlocalidades.js')}}"></script>
@endsection
