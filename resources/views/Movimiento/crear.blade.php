@extends('layouts.app') @section('content') @if(Session::has('message'))
    <div class="alert alert-{{Session::get('class')}} alert-dismissable">
        <button type="button" class="close" data-dismiss="alert">&times;</button>{{Session::get('message')}}</div>
@endif
<h1 class="text-center">Nuevo Servicio</h1>

<hr>
<form class="form-group" action="{{url('Movimiento/agregar')}}" method="post" id="frmAgregar">
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

            <label for="Cliente">Cliente <span style="color:#FF0000;font-size: 15pt">*</span></label>
            <select class="form-control" required name="Cliente">
                @foreach($clientes as $cliente)
                <option value="{{$cliente->CliId}}">{{$cliente->NomCli}}
                    @endforeach
                </select>

                <label for="localidadCliente">Localidad del Cliente <span style="color:#FF0000;font-size: 15pt">*</span></label>
                <select class="form-control" required name="CliLocId">
                    <!-- Llenar automaticamente dependiendo del cliente de arriba -->
                </select>

                <label for="minigrip">Referencia MiniGrip <span style="color:#FF0000;font-size: 15pt">*</span></label>
                <input class="form-control" type="text" required name="RefCli" value="{{old('RefCli')}}" placeholder="Numero de Referencia Minigrip">

                <label for="TipoUnidad">Tipos de unidad <span style="color:#FF0000;font-size: 15pt">*</span></label>
                <select class="form-control" required name="TipUni" id="tipoUnidad">
                  <!-- Llenar automatico -->
                </select>

                <label for="Unidades">Unidades <span style="color:#FF0000;font-size: 15pt">*</span></label>
                <select name="UniId" id="unidad" required class="form-control">
                  <!-- Llenar automatico -->
                </select>
                <small id="passwordHelpBlock" class="form-text text-muted">
                  Necesario seleccionar tipo de unidad
                </small>
            </div>
            <div class="col-lg-3">
                <h3 class="text-center">Eventualidades</h3>
                <label for="adicional1">Eventualidad 1</label>
                <select class="form-control" name="AdiId1">
                    <option value="0">En caso de existir</option>
                    @foreach($adicionales as $adicional)
                    <option value="{{$adicional->AdiId}}" data-costo="{{$adicional->CosAdi}}">{{$adicional->DesAdi}}</option>
                    @endforeach
                </select>
                <input type="text" class="form-control" name="AdiValId1" value="{{old('AdiValId1')}}" placeholder="Cantidad">

                <label for="adicional2">Eventualidad 2</label>
                <select class="form-control" name="AdiId2">
                    <option value="0">En caso de existir</option>
                    @foreach($adicionales as $adicional)
                    <option value="{{$adicional->AdiId}}" data-costo="{{$adicional->CosAdi}}">{{$adicional->DesAdi}}</option>
                    @endforeach
                </select>
                <input type="text" class="form-control" name="AdiValId2" value="{{old('AdiValId2')}}" placeholder="Cantidad">

                <label for="adicional3">Eventualidad 3</label>
                <select class="form-control" name="AdiId3">
                    <option value="0">En caso de existir</option>
                    @foreach($adicionales as $adicional)
                    <option value="{{$adicional->AdiId}}" data-costo="{{$adicional->CosAdi}}">{{$adicional->DesAdi}}</option>
                    @endforeach
                </select>
                <input type="text" class="form-control" name="AdiValId3" value="{{old('AdiValId3')}}" placeholder="Cantidad">
            </div>
        </div>
        <hr>
        <h3 class="text-center">Datos del Servicio</h3>
        <hr>
        <div class="row">
            <div class="col-lg-6">
                <label for="fase">Fase del servicio <span style="color:#FF0000;font-size: 15pt">*</span></label>
                <select class="form-control" required name="FasMovId">
                    @foreach($fases as $fase)
                    <option value="{{$fase->FasMovId}}">{{$fase->FasMov}}</option>
                    @endforeach
                </select>
                <label for="tarimas">Numero de Tarimas <span style="color:#FF0000;font-size: 15pt">*</span></label>
                <input class="form-control" type="number" required name="NumTar" value="{{old('NumTar')}}" placeholder="Cantidad de Tarimas">

                <label for="kilosbrutos">Kilos Brutos <span style="color:#FF0000;font-size: 15pt">*</span></label>
                <input class="form-control" required type="number" step="any" name="KilBru" required value="{{old('KilBru')}}" placeholder="Cantidad de kilos brutos">

            </div>
            <div class="col-lg-6">
                <label for="kilosnetos">Kilos Netos</label>
                <input class="form-control" type="number" step="any" name="KilNet" value="{{old('KilNet')}}" placeholder="Cantidad de kilos netos">
                <!-- LLenado automatico -->
                <label for="factortarifa">Factor de la tarifa <span style="color:#FF0000;font-size: 15pt">*</span></label>
                <input class="form-control" type="number" step="any" readonly="readonly" name="FacTar" value="{{old('FacTar')}}" placeholder="Debes seleccionar un cliente y unidad">

                <!-- Calculo entre los kilos netos y la tarifa -->
                <label for="totaltarifa">Factor total de la Tarifa</label>
                <input class="form-control" type="number" step="any" required readonly="readonly" name="FacTarTot" value="{{old('FacTarTot')}}" placeholder="Total de la tarifa">

            </div>
            <div class="col-lg-12">
                <label for="observaciones">Observaciones</label>
                <textarea class="form-control" name="ObsMov" value="{{old('ObsMov')}}" placeholder="Observaciones del movimiento"></textarea>

                <input type="submit" name="button" value="Registrar" class="btn btn-primary btn-lg btn-block mt-4 mb-4" id="btnRegistrar">

            </div>
        </div>

    </form>
    @endsection @section('scripts')
    @if(isset($movimiento))
    <input type="hidden" name="MovId" value="{{$movimiento}}">
    <script type="text/javascript" src="{{asset('js/movimiento/editar.js')}}">
    </script>
    @endif
    <script type="text/javascript" src="{{asset('js/movimiento/data.js')}}"></script>
    @endsection
