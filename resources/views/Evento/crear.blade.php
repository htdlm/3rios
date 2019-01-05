@extends('layouts.app') @section('content')
@if(Session::has('message'))
<div class="card-footer">
  <div class="alert alert-{{Session::get('class')}} alert-dismissable">
    <button type="button" class="close" data-dismiss="alert">&times;</button>{{Session::get('message')}}</div>
</div>
@endif
<h1 class="text-center">Nuevo Movimiento</h1>
<hr>
<form class="form-group" action="{{url('Movimiento/agregar')}}" method="post">
    {{csrf_field()}}
    <div class="row">
        <div class="col-lg-3">
            <h3 class="text-center">Fechas</h3>
            <label for="fechacreacion">Fecha de creacion</label>
            <input class="form-control" type="date" name="FecCre" value="<?php echo date('Y-m-d'); ?>">

            <label for="fechacreacion">Fecha de Actualizacion</label>
            <input class="form-control" type="date" name="FecAct" value="<?php echo date('Y-m-d'); ?>">

            <label for="fechacreacion">Fecha de Servicio</label>
            <input class="form-control" type="date" name="FecSer" value="<?php echo date('Y-m-d'); ?>">

            <label for="fechacreacion">Fecha de solicitud</label>
            <input class="form-control" type="date" name="FecSol" value="<?php echo date('Y-m-d'); ?>">

            <label for="fechacreacion">Fecha Real</label>
            <input class="form-control" type="date" name="FecRea" value="<?php echo date('Y-m-d'); ?>">
        </div>
        <div class="col-lg-3">
            <h3 class="text-center">Semanas</h3>
            <!--Calculos automaticos CHECAR -->
            <label for="semanaservicio">Semana de servicio</label>
            <input class="form-control" type="number" name="SemSer" value="<?php echo date('W')?>">

            <label for="semanasolicitud">Semana de solicitud</label>
            <input class="form-control" type="number" name="SemSol" value="<?php echo date('W')?>">

            <label for="semanareal">Semana Real</label>
            <input class="form-control" type="number" name="SemRea" value="<?php echo date('W')?>">
        </div>
        <div class="col-lg-3">
            <h3 class="text-center">Datos cliente</h3>

            <label for="Cliente">Cliente</label>
            <select class="form-control" name="Cliente">
                @foreach($clientes as $cliente)
                <option value="{{$cliente->CliId}}">{{$cliente->NomCli}}
                    @endforeach
                </select>

                <label for="localidadCliente">Localidad del Cliente</label>
                <select class="form-control" name="CliLocId">
                    <!-- Llenar automaticamente dependiendo del cliente de arriba -->
                </select>

                <label for="minigrip">Referencia MiniGrip</label>
                <input class="form-control" type="text" name="RefCli" value="{{old('RefCli')}}" placeholder="Numero de Referencia Minigrip">
            </div>
            <div class="col-lg-3">
                <h3 class="text-center">Adicionales</h3>
                <label for="adicional1">Adicional 1</label>
                <select class="form-control" name="AdiId1">
                    <option value="">En caso de existir</option>
                    @foreach($adicionales as $adicional)
                    <option value="{{$adicional->AdiId}}">{{$adicional->DesAdi}}</option>
                    @endforeach
                </select>

                <label for="adicional2">Adicional 2</label>
                <select class="form-control" name="AdiId2">
                    <option value="">En caso de existir</option>
                    @foreach($adicionales as $adicional)
                    <option value="{{$adicional->AdiId}}">{{$adicional->DesAdi}}</option>
                    @endforeach
                </select>

                <label for="adicional3">Adicional 3</label>
                <select class="form-control" name="AdiId3">
                    <option value="">En caso de existir</option>
                    @foreach($adicionales as $adicional)
                    <option value="{{$adicional->AdiId}}">{{$adicional->DesAdi}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <hr>
        <h3 class="text-center">Datos del movimiento</h3>
        <hr>
        <div class="row">
            <div class="col-lg-6">
                <label for="fase">Fase del movimiento</label>
                <select class="form-control" name="FasMovId">
                    @foreach($fases as $fase)
                    <option value="{{$fase->FasMovId}}">{{$fase->FasMov}}</option>
                    @endforeach
                </select>
                <label for="tarimas">Numero de Tarimas</label>
                <input class="form-control" type="number" name="NumTar" value="{{old('NumTar')}}" placeholder="Cantidad de Tarimas">

                <label for="kilosbrutos">Kilos Brutos</label>
                <input class="form-control" type="number" step="any" name="KilBru" value="{{old('KilBru')}}" placeholder="Cantidad de kilos brutos">

            </div>
            <div class="col-lg-6">
                <label for="kilosnetos">Kilos Netos</label>
                <input class="form-control" type="number" step="any" readonly="readonly" name="KilNet" value="{{old('KilNet')}}" placeholder="Cantidad de kilos netos">
                <!-- LLenado automatico -->
                <label for="factortarifa">Factor de la tarifa</label>
                <input class="form-control" type="number" step="any" readonly="readonly" name="FacTar" value="{{old('FacTar')}}" placeholder="Factor de la tarifa al cliente">

                <!-- Calculo entre los kilos netos y la tarifa -->
                <label for="totaltarifa">Factor total de la Tarifa</label>
                <input class="form-control" type="number" step="any" readonly="readonly" name="FacTarTot" value="{{old('FacTarTot')}}" placeholder="Total de la tarifa">
            </div>
            <div class="col-lg-12">
                <label for="observaciones">Observaciones</label>
                <textarea class="form-control" name="ObsMov" value="{{old('ObsMov')}}" placeholder="Observaciones del movimiento"></textarea>

                <input type="submit" name="button" value="Registrar" class="btn btn-success btn-lg btn-block mt-4 mb-4">

            </div>
        </div>

    </form>
    @endsection @section('scripts')
    <script type="text/javascript" src="{{asset('js/movimiento/data.js')}}"></script>
    @endsection
