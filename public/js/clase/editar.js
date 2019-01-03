function editar(id) {
    //Modificar el titulo del modal
    $('.modal-title').text('Editar Clase');
    //Modificar el titulo y color del boton del modal
    $('#btnCrear').val('Editar').removeClass('btn-success').addClass('btn-info');
    //Modificar action del form
    $('#frmAgregar').attr('action', 'Clase/actualizar/' + id);
    $.get('Clase/mostrar/' + id, function(data) {
        $('input[name=DesCla]').val(data.DesCla);
        $('textarea[name=ObsCla]').val(data.ObsCla);
    });
}