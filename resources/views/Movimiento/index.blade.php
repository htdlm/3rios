@extends('layouts.app') @section('estilos')
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection @section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col-lg-8">
						<h2 class="text-center">Movimientos</h2>
					</div>
					<div class="col-lg-4">
						<a href="{{url('Movimiento/crear')}}" class="btn btn-primary btn-block btn-lg" id="btnAgregar">
							Añadir Movimiento
							<img alt="" src="{{asset('imagenes/agregar.png')}}"/>
						</a>
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-lg-12">
						<div class="table-responsive-lg col-lg-12">
							<table class="table table-striped table-bordered table-sm" id="tblTabla">
								<thead>
									<th class="text-center">Fecha de creacion</th>
									<th class="text-center">Fase del movimiento</th>
									<th class="text-center">Localidad</th>
									<th class="text-center">Referencia Minigrip</th>
									<th class="text-center">$$$ Factor total</th>
									<th class="text-center">Editar</th>
									<th class="text-center">Eliminar</th>
									<th class="text-center">Mas</th>
									<th class="text-center">Excel</th>
								</thead>
								<tbody>
									@foreach($movimientos as $movimiento)
									<tr>										
										<td class="text-center">{{$movimiento->FecCre}}</td>
										<td class="text-center">{{$movimiento->fase_movimiento->FasMov}}</td>
										<td class="text-center">{{$movimiento->cliente_localidad->NomLoc}}</td>
										<td class="text-center">{{$movimiento->RefCli}}</td>
										<td class="text-center">{{$movimiento->FacTarTot}}</td>
										<td class="text-center">
											<a href="{{url('Movimiento/editar')}}/{{$movimiento->MovId}}" class="btn btn-info btn-bloc btnEditar" value="{{$movimiento->MovId}}">Editar</a>
										</td>
										<td class="text-center">
											<a href="{{url('Movimiento/eliminar/')}}/{{$movimiento->MovId}}">
												<button class="btn btn-danger btn-bloc" onclick="return confirm('¿Seguro de que desea eliminar este registro?')">Eliminar</button>
											</a>
										</td>
										<td class="text-center">
											<a href="{{url('Movimiento/editar')}}/{{$movimiento->MovId}}" class="btn btn-warning btnMas" value="{{$movimiento->MovId}}">Mas..</a>
										</td>
										<td class="text-center">
											<a href="{{url('Movimiento/excel')}}/{{$movimiento->MovId}}" class="btn btn-success btnMas" value="{{$movimiento->MovId}}">Excel</a>
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
		</div>
	</div>
</div>
@endsection @section('scripts')
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('js/tabla.js')}}"></script>
<script src="{{asset('js/movimiento/editar.js')}}"></script>
@endsection
