@extends('layouts.modal')
@section('titulo')
Nueva Finanza
@endsection
@section('body')
<form action="Finanza/agregar" method="post" id="frmAgregar">
    {{csrf_field()}}
    <div class="row">
        <div class="col-lg-12">
          <label for="tipounidad">Movimiento <span style="color:#FF0000;font-size: 15pt">*</span></label>
          <select class="form-control" required name="MovId">
            <option value="1">AD17</option>
            @foreach($movimientos as $movimiento)
            <option value="{{$movimiento->MovId}}">{{$movimiento->RefCli}}</option>
            @endforeach
          </select>
            <label for="Importe">Importe</label>
            <input type="number" readonly class="form-control" placeholder="Importe del movimiento" name="ImpFin" value="{{old('ImpFin')}}">

            <label for="iva">IVA <span style="color:#FF0000;font-size: 15pt">*</span></label>
            <input type="number" required class="form-control" placeholder="IVA %" name="IvaFin" value="{{old('IvaFin')}}">
            <small id="passwordHelpBlock" class="form-text text-muted">
              Introduzca 0 en caso de no aplicar
            </small>

            <label for="retencion">Retencion % <span style="color:#FF0000;font-size: 15pt">*</span></label>
            <input type="number" required class="form-control" placeholder="Retencion" name="RetFin" value="{{old('RetFin')}}">
            <small id="passwordHelpBlock" class="form-text text-muted">
              Introduzca 0 en caso de no aplicar
            </small>
            
            <label for="total">Total</label>
            <input type="number" readonly class="form-control" placeholder="Total" name="TotFin" value="{{old('TotFin')}}">
        </div>
    </div>
    <input type="submit" class="btn btn-success btn-block btn-lg mt-4" value="Agregar" id="btnCrear">
</form>
@endsection
