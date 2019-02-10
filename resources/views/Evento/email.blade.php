<h1>¡Nuevo evento registrado!</h1>
<h2>Logística Tres Ríos - Reporte de Status de Servicio en Transito</h2>
<div class="">
  @foreach($movimiento->eventos as $evento)
    <h3>{{$evento->fase_movimiento->FasMov}}</h3>
    <h4><?php echo date("F j, Y, / g:i a",strtotime($evento->created_at))?> / {{$evento->ObsEve}}</h4>
  @endforeach
</div>
