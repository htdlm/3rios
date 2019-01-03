@extends('layouts.app')
@section('estilos')
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col-lg-8">
						<h2 class="text-center">Operadores</h2>
					</div>
					<div class="col-lg-4">
						<button class="btn btn-primary btn-block btn-lg" data-target="#ventana" data-toggle="modal" id="btnAgregar">
						Añadir Operador
						<img alt="" src="{{asset('imagenes/agregarusuario.png')}}"/>
						</button>
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-lg-12">
						<div class="table-responsive-lg col-lg-12">
							<table class="table table-striped table-bordered table-sm" id="tblTabla">
								<thead>
									<th class="text-center">Nombre</th>
									<th class="text-center">Email</th>
									<th class="text-center">Direccion</th>
									<th class="text-center">Telefono</th>
									<th class="text-center">RFC</th>
									<th class="text-center">Editar</th>
									<th class="text-center">Eliminar</th>
									<th class="text-center">Mas info...</th>
								</thead>
								<tbody>
									@foreach($operadores as $operador)
									<tr>
										<td class="text-center">{{$operador->NomOpe}}</td>
										<td class="text-center">{{$operador->EmaOpe}}</td>
										<td class="text-center">{{$operador->DirOpe}}</td>
										<td class="text-center">{{$operador->TelOpe}}</td>
										<td class="text-center">{{$operador->NssOpe}}</td>
										<td class="text-center">
											<button class="btn btn-info btnEditar" value="{{$operador->OpeId}}" data-target="#ventana" data-toggle="modal" >Editar</button>
										</td>
										<td class="text-center">
											<a href="{{url('Operador/eliminar/')}}/{{$operador->OpeId}}"><button class="btn btn-danger" onclick="return confirm('¿Seguro de que desea eliminar este registro?')">Eliminar</button></a>
										</td>
										<td>
											<a href=""><button class="btn btn-warning">Mas..</button></a>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			@if(Session::has('message'))
			<div class="card-footer">
				<div class="alert alert-{{Session::get('class')}} alert-dismissable">
				<button type="button" class="close" data-dismiss="alert">&times;</button>{{Session::get('message')}}</div>
			</div>
			@endif
			@include('Operador.modal')
		</div>
	</div>
</div>
@endsection
@section('scripts')
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js">
</script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js">
</script>
<script src="{{asset('js/tabla.js')}}"></script>
<script src="{{asset('js/operador/editar.js')}}">
</script>
@endsection
