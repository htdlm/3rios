function editar(id) {
    //Modificar el titulo del modal
    $('.modal-title').text('Editar Servicio');
    //Modificar el titulo y color del boton del modal
    $('#btnCrear').val('Editar'); //.removeClass('btn-success').addClass('btn-info');*/
    //Modificar action del form
    $('#frmAgregar').attr('action', '/TipoServicio/actualizar/' + id);
    $.get('/TipoServicio/mostrar/' + id, function(data) {
        $('input[name=TipSer]').val(data.TipSer);
        $('textarea[name=ObsTipSer]').val(data.ObsTipSer);
    });
}