$(document).ready(function() {
    /*Datos del modal originales*/
    var action = $('#frmAgregar').attr('action');
    var tituloModal = $('.modal-title').text();

    //Datatable
    $('#tblTabla').DataTable();

    /*Al presionar el boton, se carga el registro dependiendo del id
    y coloca la informacion el los campos, modifica el modal y la ruta para
    actualizar el formulario*/
    $('.btnEditar').on('click', function() {
        var id = $(this).val();
        editar(id);
    });

    //Regresar datos originales
    $('#btnAgregar').on('click', function() {
        agregar(action, tituloModal);
    });

    /*Boton mas ejecutar metodo editar*/
    $('.btnMas').on('click', function() {
        var id = $(this).val();
        editar(id);

        //Modificar el titulo del modal
        $('.modal-title').text('Mas Informacion');

        //Esconder el boton
        $('#btnCrear').css('display', 'none');

        /*Desactivar los inputs*/
        $('input').attr('disabled', 'true');
        $('select').attr('disabled', 'true');
        $('textarea').attr('disabled', 'true');
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

    /*Si antes se presiono el boton de mas.., reactivamos los campos para poderlos editar*/
    //reactivar();
}

/*Reactivar boton e inputs*/
function reactivar() {
    //Esconder el boton
    $('#btnCrear').css('display', 'inline');

    /*Desactivar los inputs*/
    $('input').removeAttr('disabled');
    $('select').removeAttr('disabled');
    $('textarea').removeAttr('disabled');
}