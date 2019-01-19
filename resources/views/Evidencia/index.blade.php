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
						<h2 class="text-center">Evidencias</h2>
					</div>
					<div class="col-lg-4">
						<button class="btn btn-primary btn-block btn-lg" data-target="#ventana" data-toggle="modal" id="btnAgregar">
							Añadir Evidencia
							<img alt="" src="{{asset('imagenes/agregar.png')}}"/>
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
									<th class="text-center">Numero de Evidencia</th>
									<th class="text-center">Ref Minigrip</th>
									<th class="text-center">Descripcion</th>
									<th class="text-center">Fecha Presentacion</th>
									<th class="text-center">Fecha Retorno</th>
									<th class="text-center">Nombre archivo</th>
									@if(Auth::check() && Auth::user()->hasRole('Administrador'))
									<th class="text-center">Descargar</th>
									<th class="text-center">Editar</th>
									<th class="text-center">Eliminar</th>
									@endif
								</thead>
								<tbody>
									@foreach($evidencias as $evidencia)
									<tr>
										<td class="text-center">{{$evidencia->EviId}}</td>
										<td class="text-center">{{$evidencia->movimiento->RefCli}}</td>
										<td class="text-center">{{$evidencia->DesEvi}}</td>
										<td class="text-center">{{$evidencia->FecPre}}</td>
										<td class="text-center">{{$evidencia->FecRet}}</td>
										<td class="text-center">{{$evidencia->ArcEvi}}</td>
										@if(Auth::check() && Auth::user()->hasRole('Administrador'))
										<td class="text-center">
											<a href="{{url('/Evidencia/mostrar/archivo/')}}/{{$evidencia->EviId}}"><img src="{{asset('imagenes/picture.png')}}" alt="{{$evidencia->ArcEvi}}"></a>
										</td>
										<td class="text-center">
											<button class="btn btn-info btnEditar" value="{{$evidencia->EviId}}" data-target="#ventana" data-toggle="modal">Editar</button>
											<td class="text-center">
												<a href="{{url('Evidencia/eliminar/')}}/{{$evidencia->EviId}}">
													<button class="btn btn-danger" onclick="return confirm('¿Seguro de que desea eliminar este registro?')">Eliminar</button>
												</a>
											</td>
											@endif
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
				@endif @include('Evidencia.modal')
			</div>
		</div>
	</div>
	@endsection @section('scripts')
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
	<script src="{{asset('js/tabla.js')}}"></script>
	<script src="{{asset('js/evidencia/editar.js')}}"></script>
	@endsection
