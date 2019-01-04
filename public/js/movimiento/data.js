$(document).ready(function() {
    cargarLocalidades(1);
    getTarifa(1);
});

//Lenar select de localidades
$('select[name=Cliente]').on('change', function() {
    var id = $(this).val();
    cargarLocalidades(id);
    getTarifa(id);
});

//Operar kilos brutos
$('input[name=NumTar]').on('change', function() {
    if ($('input[KilBru]').val() != "") {
        operar();
    }
});

//Operar kilos brutos
$('input[name=KilBru]').on('change', function() {
    if ($('input[name=NumTar]').val() != "") {
        operar();
    } else {
        alert('Agregue un numero de Tarimas para calcular el total de kilos')
    }
});

//Funciones al cambiar el cliente
function cargarLocalidades(id) {
    $.get('/Localidades/mostrar/' + id, function(data) {
        $('select[name=CliLocId').empty();
        $('select[name=CliLocId').append('<option value="">Seleccione una localidad</option>');
        var texto = "";

        for (var i = 0; i < data.length; i++) {
            texto = '<option value="' + data[0].LocId + '">' + data[0].DesLoc + " - " + data[0].NomLoc + '</option>'
            $('select[name=CliLocId').append(texto);
        }
    });
}
//traer Tarifa para ese cliente
function getTarifa(id) {
    $.get('/TarifaCliente/mostrar/' + id, function(data) {
        $('input[name=FacTar]').val(data);
    });
}

//Calcular kilos y factor total
function operar() {
    var tarimas = parseInt($('input[name=NumTar]').val());
    var kilbrutos = parseInt($('input[name=KilBru]').val());
    var kilNetos = parseFloat((tarimas * 1.2) + kilbrutos);
    var tarifa = parseFloat($('input[name=FacTar]').val())
    var totalTarifa = parseFloat(kilNetos * tarifa);

    $('input[name=KilNet]').val(kilNetos);
    $('input[name=FacTarTot]').val(totalTarifa);
}