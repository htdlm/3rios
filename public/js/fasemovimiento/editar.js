function editar(id) {
    //Modificar el titulo del modal
    $('.modal-title').text('Editar Fase del Movimiento');
    //Modificar el titulo y color del boton del modal
    $('#btnCrear').val('Editar').removeClass('btn-success').addClass('btn-info');
    //Modificar action del form
    $('#frmAgregar').attr('action', 'FaseMovimiento/actualizar/' + id);
    $.get('FaseMovimiento/mostrar/' + id, function(data) {
        $('input[name=FasMov]').val(data.FasMov);

        if (data.PriFas == 1) {
            $('input[name=PriFas]').prop('checked', true);
        } else {
            $('input[name=PriFas]').prop('checked', false);
        }

        $('textarea[name=ObsFasMov]').val(data.ObsFasMov);
    });
}