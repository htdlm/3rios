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
        });
    } else {
        $('input[name=ImpFac]').val("");
    }
}

//Al Seleccionar un movimiento
$('select[name=MovId]').on('change', function() {
    var id = $(this).val();
    getImporte(id);
});

/*CALCULOS*/
function getSubtotal(importe, iva) {
    iva /= 100;
    var subtotal = parseFloat(importe * iva);
    return importe + subtotal;
}

/*Cuando se digite un iva*/
$('input[name=IvaFac]').on('change', function() {
    var importe = parseFloat($('input[name=ImpFac]').val());
    var iva = parseFloat($('input[name=IvaFac]').val());
    var subtotal = getSubtotal(importe, iva);
    $('input[name=SubFac]').val(subtotal);

});

//retencion
function getRetencion(subtotal, retencion) {
    retencion /= 100;
    var total = parseFloat(subtotal * retencion);
    return subtotal - total;
}

/*Cuando se digita una retencion*/
$('input[name=RetFac]').on('change', function() {
    var subtotal = parseFloat($('input[name=SubFac]').val());
    var ret = parseFloat($('input[name=RetFac]').val());
    var total = getRetencion(subtotal, ret);
    $('input[name=TotFac]').val(total);
    $('input[name=SalFac]').val(total);
});

/*Boton para generar el XML*/
$('#btnExcel').on('click', function() {
    window.open("/FacturaCxp/excel");
});