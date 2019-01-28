@extends('layouts.modal') @section('titulo') Nueva factura @endsection @section('body')
<form action="/FacturaCxc/agregar" method="post" id="frmAgregar">
	{{csrf_field()}}
	<div class="row">
		<div class="col-lg-6">
			<label for="Numero">Numero de factura <span style="color:#FF0000;font-size: 15pt">*</span></label>
			<input type="text" class="form-control" required placeholder="Numero de la factura" name="FacCxcNum" value="{{old('FacCxcNum')}}" autofocus="autofocus">

			<label for="movimientos">Movimiento <span style="color:#FF0000;font-size: 15pt">*</span></label>
			<select class="form-control" required name="MovId">
				<option value="0">Selecciona una opcion</option>
				@foreach($movimientos as $movimiento)
				<option value="{{$movimiento->MovId}}">{{$movimiento->RefCli}}</option>
				@endforeach
			</select>

			<label for="Contacto">Contacto de la factura</label>
			<input type="text" class="form-control" placeholder="Nombre del contacto" name="ConFac" value="{{old('ConFac')}}">

			<label for="fechacreacion">Fecha de creacion de la factura</label>
			<input type="date" class="form-control" name="FecCreFac" value="<?php echo date('Y-m-d'); ?>">

			<label for="fechafactura">Fecha de la factura</label>
			<input type="date" class="form-control" name="FecFac" value="<?php echo date('Y-m-d'); ?>">

			<label for="fechapresentacion">Fecha de presentacion de la factura</label>
			<input type="date" class="form-control" name="FecPre" value="<?php echo date('Y-m-d'); ?>">
		</div>
		<div class="col-lg-6">
			<label for="importe">Importe</label>
			<input type="number" step="any" class="form-control" placeholder="$ Importe" name="ImpFac" value="{{old('ImpFac')}}">

			<label for="iva">IVA <span style="color:#FF0000;font-size: 15pt">*</span></label>
			<input type="number" required step="any" class="form-control" placeholder="% IVA" name="IvaFac" value="16">
			<small id="passwordHelpBlock" class="form-text text-muted">
				Introduzca 0 en caso de no aplicar
			</small>

			<label for="subtotal">Subtotal</label>
			<input type="number" step="any" class="form-control" placeholder="$ Subtotal" name="SubFac" value="{{old('SubFac')}}">

			<label for="retencion">Retencion <span style="color:#FF0000;font-size: 15pt">*</span></label>
			<input type="number" step="any" required class="form-control" placeholder="% Retencion" name="RetFac" value="4">
			<small id="passwordHelpBlock" class="form-text text-muted">
				Introduzca 0 en caso de no aplicar
			</small>

			<label for="total">Total</label>
			<input type="number" step="any" readonly="readonly" class="form-control" placeholder="$ Total" name="TotFac" value="{{old('TotFac')}}">

			<label for="saldo">Saldo</label>
			<input type="number" step="any" readonly="readonly" class="form-control" placeholder="$ Saldo" name="SalFac" value="{{old('SalFac')}}">
		</div>
		<div class="col-lg 12">
			<label for="observaciones">Observaciones</label>
			<textarea name="ObsFac" class="form-control" placeholder="Observaciones"></textarea>
		</div>
	</div>
	<input type="submit" class="btn btn-success btn-block btn-lg mt-4" value="Agregar" id="btnCrear">
</form>
@endsection
