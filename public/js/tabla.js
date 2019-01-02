$(document).ready(function() {
    //Datatable
    $('#tblTabla').DataTable();
    //Variables para datos originales
    var action;
    var tituloModal;
    $('.btnEditar').on('click', function() {
        //Guardar los datos del principio
        action = $('#frmAgregar').attr('action');
        tituloModal = $('.modal-title').text();
        var id = $(this).val();
        editar(id);
    });
    //Regresar datos originales
    $('#btnAgregar').on('click', function() {
        agregar(action, tituloModal);
    });
});

function agregar(action, tituloModal) {
    //Boton agregar nuevo registro    
    //Modificar el titulo del modal
    $('.modal-title').text(tituloModal);
    //Modificar el titulo y color del boton del modal
    $('#btnCrear').val('Agregar').removeClass('btn-info').addClass('btn-success');
    //Modificar action del form y limpiarlo en caso de que no se haga ninguna acccion
    $('#frmAgregar').attr('action', action);
    $('#frmAgregar')[0].reset();
}