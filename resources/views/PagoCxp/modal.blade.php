@extends('layouts.modal')
@section('titulo')
Nuevo Pago
@endsection
@section('body')
<form action="PagoCxp/agregar" method="post" id="frmAgregar">
    {{csrf_field()}}
    <div class="row">
        <div class="col-lg-12">
          <label for="NumeroPago">Numero de Pago</label>
          <input type="number" class="form-control" name="NumPag" value="{{old('NumPag')}}" placeholder="Numero de pago">

          <label for="factura">Numero de factura  <span style="color:#FF0000;font-size: 15pt">*</span></label>
          <select class="form-control" required name="FacCxpNum">
            <option value="0">Seleccione una opcion</option>
            @foreach($facturas as $factura)
            <option value="{{$factura->FacCxpNum}}">{{$factura->FacCxpNum}} Saldo Pendiente (${{$factura->SalFac}})</option>
            @endforeach
          </select>

            <label for="monto">Monto <span style="color:#FF0000;font-size: 15pt">*</span></label>
            <input type="number" step="any" required class="form-control" placeholder="$ Monto del pago" name="MonPag" value="{{old('MonPag')}}">

            <label for="fechapago">Fecha de Pago</label>
            <input type="date" class="form-control" name="FecPag" value="<?php echo date('Y-m-d'); ?>">

            <label for="Referencia">Referencia de pago</label>
            <input type="text" class="form-control" placeholder="Referencia de Pago" name="RefPag" value="{{old('RefPag')}}">

            <label for="observaciones">Observaciones</label>
            <textarea class="form-control" placeholder="Observaciones" name="ObsPag" value="">{{old('ObsPag')}}</textarea>
        </div>
    </div>
    <input type="submit" class="btn btn-success btn-block btn-lg mt-4" value="Agregar" id="btnCrear">
</form>
@endsection
