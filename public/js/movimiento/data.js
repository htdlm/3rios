$(document).ready(function() {
    /*Cargar localidades y tipo de unidades del clientes, Como se
    cargan todos los clientes, se empieza por el primero
    podemos camboarlo y al hacerle click agregando un option
    de 'Seleccione una opcion'*/
    cargarLocalidades(1);
    getTipoUnidades(1);
});

/*Lenar select de localidades y tipos de unidades en base al cliente*/
$('select[name=Cliente]').on('change', function() {
    var id = $(this).val();
    cargarLocalidades(id);
    getTipoUnidades(id);

    //Limpiar unidades y factor tarifa
    $('#unidad').empty();
    $('input[name=FacTar]').val("");
});

/*traer tipo de unidades al que tiene derecho pedir servicio cada cliente seleccionado*/
function getTipoUnidades(idCliente) {
    $.get('/TipoUnidad/mostrar/tipo/' + idCliente, function(data) {
        $('#tipoUnidad').empty();
        var texto = '<option> Selecciona una opcion </option>';
        $('#tipoUnidad').append(texto);
        for (var i = 0; i < data.length; i++) {
            texto = '<option value="' + data[i].TipUniId + '">' + data[i].DesTipUni + '</option>'
            $('#tipoUnidad').append(texto);
        }
    });
}

//Tarifas del cliente, dependiendo del tipo de unidad
function getTarifa(idCliente, tipo) {
    $.get('/TarifaCliente/mostrar/' + idCliente + '/' + tipo, function(data) {
        $('input[name=FacTar]').val(data);
    });
}

//Operar kilos brutos con Tarimas
$('input[name=NumTar]').on('change', function() {
    if ($('input[KilBru]').val() != "") {
        operar();
        var tipo = $('select[name=TipUni]').find(':selected').val();
        validarPeso(tipo);
    }
});

//Operar kilos brutos
$('input[name=KilBru]').on('change', function() {
    if ($('input[name=NumTar]').val() != "") {
        operar();
        var tipo = $('select[name=TipUni]').find(':selected').val();
        validarPeso(tipo);
    } else {
        alert('Agregue un numero de Tarimas para calcular el total de kilos')
    }
});

/*Mostramos las localidades que tiene el cliente*/
function cargarLocalidades(id) {
    $.get('/Localidades/mostrar/' + id, function(data) {
        $('select[name=CliLocId').empty();
        $('select[name=CliLocId').append('<option value="">Seleccione una localidad</option>');
        var texto = "";

        for (var i = 0; i < data.length; i++) {
            texto = '<option value="' + data[i].LocId + '">' + data[i].DesLoc + " - " + data[i].NomLoc + '</option>'
            $('select[name=CliLocId').append(texto);
        }
    });
}

//Calcular kilos Netos y factor total
function operar() {
    var tarimas = parseInt($('input[name=NumTar]').val());
    var kilbrutos = parseInt($('input[name=KilBru]').val());
    var kilNetos = parseFloat((tarimas * 1.2) + kilbrutos);
    var tarifa = parseFloat($('input[name=FacTar]').val())
    var totalTarifa = parseFloat(kilNetos * tarifa);

    $('input[name=KilNet]').val(kilNetos);
    $('input[name=FacTarTot]').val(totalTarifa);
}

/* Al cambiar el select de tipos*/
$('#tipoUnidad').on('change', function() {
    var cliente = $('select[name=Cliente]').val();
    var tipo = $(this).val();

    /*Cargar tarifas depende del tipo de unidad y
    cargar todas las unidades dependiendo de ese tipo*/
    getTarifa(cliente, tipo);
    getUnidades(tipo);
});

/*Dependiento del tipo de unidad al que tiene derecho
cada cliente */
function getUnidades(idTipo) {
    //Limpiar unidades y llenar
    $('#unidad').empty();
    $.get('/Unidad/mostrar/tipo/' + idTipo, function(data) {
        var texto = "";
        for (var i = 0; i < data.length; i++) {
            texto = '<option value="' + data[i].UniId + '">' + data[i].DesUni + '(' + data[i].PlaUni + ')</option>'
            $('#unidad').append(texto);
        }
    });
}


/*Comprobar que kilos y tipo de transporte coincidan*/
function validarPeso(idTipo) {
    $.get('/TipoUnidad/mostrar/' + idTipo, function(data) {
        console.log(data);
        var kilos = parseInt($('input[name=KilNet]').val());
        kilos = kilos / 1000;
        if (kilos > data.CapMaxUni) {
            alert('El tipo de unidad no es el adecuado para la cantidad de peso');
            $('input[name=KilBru]').val("");
        }
    });
}