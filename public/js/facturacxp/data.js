/*VARIABLES GLOBALES*/
var importe = "";
var iva;
var subtotal;
var retencion;
var total;
var saldo
$(document).ready(function() {
    iva = parseFloat($('input[name=IvaFac]').val() / 100);
    retencion = parseFloat($('input[name=RetFac]').val() / 100);
});


/*Reactivar el select de Movimiento
bloqueado en el editar*/
$('#btnAgregar').on('click', function() {
    $('select[name=MovId]').removeAttr('disabled');
});

//Traer el FacTarTot del movimiento
function getImporte(id) {
    if (id != 0) {
        $.get('/Movimiento/importe/' + id, function(data) {
            $('input[name=ImpFac]').val(data);
            importe = parseFloat(data);
            $('input[name=SubFac]').val(getSubtotal());
            $('input[name=TotFac]').val(getTotal());
            $('input[name=SalFac]').val(saldo);
        });
    } else {
        $('input[name=ImpFac]').val("");
    }
}

/*Al Seleccionar un movimiento*/
$('select[name=MovId]').on('change', function() {
    var id = $(this).val();
    /*En este metodo se hace toda la operacion una vez que se
    obtiene el importe del movimiento*/
    getImporte(id);
});

/*CALCULOS*/
function getSubtotal() {
    subtotal = parseFloat((importe * iva) + importe);
    return subtotal;
}

/*Total, calcular la retencion y restarlo al subtotal*/
function getTotal() {
    /*Adecuamos la retencion a porcentaje*/
    var diferencia = parseFloat(subtotal * retencion);
    total = parseFloat(subtotal - diferencia);
    saldo = parseFloat(total);
    return total;
}

/*Cuando se digite un nuevo iva*/
$('input[name=IvaFac]').on('change', function() {
    //    var importe = parseFloat($('input[name=ImpFac]').val());
    iva = parseFloat($(this).val() / 100);
    $('input[name=SubFac]').val(getSubtotal());
    /*Recalcular*/
    $('input[name=TotFac]').val(getTotal());
    $('input[name=SalFac]').val(getTotal());
});

/*Cuando se digita una retencion*/
$('input[name=RetFac]').on('change', function() {
    retencion = parseFloat($(this).val() / 100);
    /*Recalcular*/
    $('input[name=TotFac]').val(getTotal());
    $('input[name=SalFac]').val(getTotal());
});

/*Cuando se digita un nuevo importe
Aunque no deberia de ser*/
$('input[name=ImpFac]').on('change', function() {
    importe = parseFloat($(this).val());
    /*Recalcular*/
    $('input[name=SubFac]').val(getSubtotal());
    $('input[name=TotFac]').val(getTotal());
    $('input[name=SalFac]').val(getTotal());
});

/*Cuando se digita un nuevo subtotal
Aunque no deberia de ser*/
$('input[name=SubFac]').on('change', function() {
    subtotal = parseFloat($(this).val());
    /*Recalcular*/
    $('input[name=TotFac]').val(getTotal());
    $('input[name=SalFac]').val(getTotal());
});


/*Boton para generar el XML*/
$('#btnExcel').on('click', function() {
    window.open("/FacturaCxp/excel");
});