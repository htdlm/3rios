function editar(id) {
    //Modificar el titulo del modal
    $('.modal-title').text('Editar Finanza');
    //Modificar el titulo y color del boton del modal
    $('#btnCrear').val('Editar'); //.removeClass('btn-success').addClass('btn-info');*/
    //Modificar action del form
    $('#frmAgregar').attr('action', 'Finanza/actualizar/' + id);
    $.get('Finanza/mostrar/' + id, function(data) {
        $('select[name=MovId]').find(":selected").attr("selected", false);
        $("select[name=MovId] option[value='" + data.MovId + "']").attr("selected", true);

        $('input[name=ImpFin]').val(data.ImpFin);
        $('input[name=IvaFin]').val(data.IvaFin);
        $('input[name=RetFin]').val(data.RetFin);
        $('input[name=TotFin]').val(data.TotFin);
    });
}

$('select[name=MovId]').on('change', function() {
    var id = $(this).val();
    $.get('/Movimiento/importe/' + id, function(data) {
        $('input[name=ImpFin]').val(data);
        /*HACER CALCULOS */
    });
});