function editar(id) {
    //Modificar el titulo del modal
    $('.modal-title').text('Editar Adicional');
    //Modificar el titulo y color del boton del modal
    $('#btnCrear').val('Editar').removeClass('btn-success').addClass('btn-info');
    //Modificar action del form
    $('#frmAgregar').attr('action', 'Adicional/actualizar/' + id);
    $.get('Adicional/mostrar/' + id, function(data) {
        $('input[name=DesAdi]').val(data.DesAdi);
        $('input[name=UniAdi]').val(data.UniAdi);
        $('input[name=CosAdi]').val(data.CosAdi);
        $('textarea[name=ObsAdi]').val(data.ObsAdi);
    });
}