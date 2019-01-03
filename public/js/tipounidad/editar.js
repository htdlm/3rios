function editar(id) {
    //Modificar el titulo del modal
    $('.modal-title').text('Editar Tipo de unidad');
    //Modificar el titulo y color del boton del modal
    $('#btnCrear').val('Editar').removeClass('btn-success').addClass('btn-info');
    //Modificar action del form
    $('#frmAgregar').attr('action', 'TipoUnidad/actualizar/' + id);
    $.get('TipoUnidad/mostrar/' + id, function(data) {
        $('input[name=DesTipUni]').val(data.DesTipUni);
        $('input[name=CapMinUni]').val(data.CapMinUni);
        $('input[name=CapMaxUni]').val(data.CapMaxUni);
        $('input[name=ObsTipUni]').val(data.ObsTipUni);
    });
}