@extends('layouts.app') @section('estilos')
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection @section('content') @if(Session::has('message'))
<div class="alert alert-{{Session::get('class')}} alert-dismissable">
	<button type="button" class="close" data-dismiss="alert">&times;</button>{{Session::get('message')}}</div>
@endif
<h2 class="text-center">Eventos</h2>
<hr>
@foreach($movimientos as $movimiento)
<div class="row">
	<div class="col-lg-12">
		<div class="row">
			<div class="col-lg-8">
				<div class="alert alert-primary">
					@if(Auth::check() && (Auth::user()->hasRole('Administrador')||Auth::user()->hasRole('Capturador')))
					<h3 class="text-left">Id del movimiento:
						<strong>
							{{$movimiento->MovId}}</strong>
					</h3>
					@endif
					<h3 class="text-left">Codigo Minigrip:
						<strong>
							{{$movimiento->RefCli}}</strong>
					</h3>
				</div>
			</div>
			@if(Auth::check() && (Auth::user()->hasRole('Administrador')||Auth::user()->hasRole('Capturador')))
			<div class="col-lg-4">
				<button class="btn btn-primary btn-block btn-lg btnNuevo mb-4" data-target="#ventana" data-toggle="modal" data-evento="{{$movimiento}}">
					Añadir Evento
					<img alt="" src="{{asset('imagenes/agregar.png')}}"/>
				</button>
			</div>
			@endif
		</div>
	</div>
</div>
@foreach($movimiento->eventos as $evento)
<div class="alert alert-warning">
	<h4 class="text-left">Id del evento:
		<strong>{{$evento->EveId}}</strong>
	</h4>
	<h5 class="text-left">Fecha de Creacion del Evento:
		<strong>{{$evento->FecCreEve}}</strong>
	</h5>
</div>
<hr>
<div class="row">
	<div class="col-lg-4">
		<div class="card mb-4">
			<div class="card-header">
				<h3 class="text-center">Fechas</h3>
			</div>
			<div class="card-body">
				<p class="card-text">Fecha de Actualizacion:
					<strong>{{$evento->FecAct}}
					</strong>
				</p>

				<p class="card-text">Fecha de Solicitud:
					<strong>{{$evento->FecSol}}
					</strong>
				</p>

				<p class="card-text">Fecha Real:
					<strong>{{$evento->FecRea}}
					</strong>
				</p>
			</div>
		</div>
	</div>

	<div class="col-lg-4">
		<div class="card mb-4">
			<div class="card-header">
				<h3 class="text-center">Semanas</h3>
			</div>
			<div class="card-body">
				<p class="card-text">Semana de Actualizacion:
					<strong>{{$evento->SemAct}}
					</strong>
				</p>

				<p class="card-text">Semana de Solicitud:
					<strong>{{$evento->SemSol}}
					</strong>
				</p>

				<p class="card-text">Semana Real:
					<strong>{{$evento->SemRea}}
					</strong>
				</p>
			</div>
		</div>
	</div>

	<div class="col-lg-4">
		<div class="card mb-4">
			<div class="card-header">
				<h3 class="text-center">Datos Movimiento</h3>
			</div>
			<div class="card-body">
				@if($evento->fase_movimiento->PriFas && Auth::check() && (Auth::user()->hasRole('Administrador')||Auth::user()->hasRole('Capturador')))
				<p class="card-text">Fase del Movimiento:
					<strong>{{$evento->fase_movimiento->FasMov}}
					</strong>
				</p>
				@elseif(!$evento->fase_movimiento->PriFas)
				<p class="card-text">Fase del Movimiento:
					<strong>{{$evento->fase_movimiento->FasMov}}
					</strong>
				</p>
				@endif @if(($evento->adicional)!=null)
				<p class="card-text">Adicional:
					<strong>
						{{$evento->adicional->DesAdi}}
						= ${{$evento->adicional->CosAdi}}
					</strong>
				</p>
				@endif @if(($evento->ObsEve)!=null)
				<p class="card-text">Observaciones:
					<strong>{{$evento->ObsEve}}
					</strong>
				</p>
				@endif @if(Auth::check() && (Auth::user()->hasRole('Administrador')||Auth::user()->hasRole('Capturador')))
				<p class="card-text">Usuario capturador:
					<strong>{{$evento->user->name}}
					</strong>
				</p>
				@endif
			</div>
		</div>
	</div>

</div>
@endforeach
<br>
<hr>
@endforeach @include('Evento.modal') @endsection @section('scripts')
<script src="{{asset('js/evento/agregar.js')}}"></script>
@endsection