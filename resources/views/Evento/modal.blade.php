@extends('layouts.modal')
@section('titulo')
Nuevo Evento
@endsection
@section('body')
<form action="/Evento/agregar" method="post" id="frmAgregar">
    {{csrf_field()}}
    <div class="row">
        <div class="col-lg-6">
          <label for="movimiento">Id movimiento </label>
            <input class="form-control" type="number" name="MovId" readonly value="{{old('MovId')}}">

            <label for="minigrip">Minigrip</label>
              <input type="text" class="form-control" name="RefCli" readonly value="{{old('RefCli')}}">

            <label for="fechacreacion">Fecha de creacion</label>
            <input type="date" class="form-control" name="FecCreEve" readonly value="<?php echo date('Y-m-d');?>">

            <label for="fechaactualizacion">Fecha de actualizacion</label>
            <input type="date" class="form-control" name="FecAct" value="<?php echo date('Y-m-d'); ?>">

            <label for="fechasolicitud">Fecha de solicitud</label>
            <input type="date" class="form-control" name="FecSol" value="<?php echo date('Y-m-d'); ?>">

            <label for="fechareal">Fecha real</label>
            <input type="date" class="form-control" name="FecRea" value="<?php echo date('Y-m-d'); ?>">

            <label for="semanaactualizacion">Semana de actualizacion</label>
            <input type="number" class="form-control" placeholder="Semana de actualizacion" name="SemAct" value="<?php echo date('W'); ?>">
        </div>
        <div class="col-lg-6">
          <label for="semanaSolicitud">Semana de Solicitud</label>
          <input type="number" class="form-control" placeholder="Semana de Solicitud" name="SemSol" value="<?php echo date('W'); ?>">

          <label for="semanaservicio">Semana de servicio</label>
          <input type="number" class="form-control" placeholder="Semana de servicio" name="SemSer" value="<?php echo date('W'); ?>">

          <label for="semanareal">Semana de real</label>
          <input type="number" class="form-control" placeholder="Semana de real" name="SemRea" value="<?php echo date('W'); ?>">

          <label for="fases">Fase del movimiento <span style="color:#FF0000;font-size: 15pt">*</span></label>
          <select class="form-control" name="FasMovId">
              @foreach ($fases as $fase)
              <option value="{{$fase->FasMovId}}">{{$fase->FasMov}}</option>
              @endforeach
          </select>

          <label for="adicionales">Eventualidad</label>
          <select class="form-control" name="AdiId">
            <option value="">Ninguno</option>
              @foreach ($adicionales as $adicional)
              <option value="{{$adicional->AdiId}}">{{$adicional->DesAdi}}</option>
              @endforeach
          </select>

            <label for="observacion">Observacion</label>
            <textarea class="form-control" placeholder="Observaciones" name="ObsEve" value="">{{old('ObsEve')}}</textarea>
        </div>
    </div>
    <input type="submit" class="btn btn-success btn-block btn-lg mt-4" value="Agregar" id="btnCrear">
</form>
@endsection
