function editar(id) {
    //Modificar el titulo del modal
    $('.modal-title').text('Editar Rol/Usuario');
    //Modificar el titulo y color del boton del modal
    $('#btnCrear').val('Editar'); //.removeClass('btn-success').addClass('btn-info');*/
    //Modificar action del form
    $('#frmAgregar').attr('action', 'Usuario/actualizar/' + id);
    $.get('Usuario/mostrar/' + id, function(data) {
        $('select[name=UseId]').find(":selected").attr("selected", false);
        $("select[name=UseId] option[value='" + data.UseId + "']").attr("selected", true);

        $('select[name=RolId]').find(":selected").attr("selected", false);
        $("select[name=RolId] option[value='" + data.RolId + "']").attr("selected", true);
    });
}

/*Bloquear unidad y transportista para editar*/
$('.btnEditar').on('click', function() {
    $('select[name=UseId]').attr('disabled', 'true');
});

/*Desbloquear unidad y transportista para editar*/
$('#btnAgregar').on('click', function() {
    $('select[name=UseId]').removeAttr('disabled');
});