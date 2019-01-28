$('.btnEditar').on('click', function() {
    /*Si antes se presiono el boton de mas.., reactivamos los campos para poderlos editar*/
    /*Esta funcion esta en el js de tabla.js, permite
    reactivar los inputs*/
    reactivar();
});

//Regresar datos originales
$('#btnAgregar').on('click', function() {
    /*Esta funcion esta en el js de tabla.js, permite
    reactivar los inputs*/
    reactivar();
});

function editar(id) {
    //Modificar el titulo del modal
    $('.modal-title').text('Editar Transportista');
    //Modificar el titulo y color del boton del modal
    $('#btnCrear').val('Editar').removeClass('btn-success').addClass('btn-info');
    //Modificar action del form
    $('#frmAgregar').attr('action', 'Transportista/actualizar/' + id);
    $.get('Transportista/mostrar/' + id, function(data) {
        $('input[name=NomTra]').val(data.NomTra);
        $('input[name=ConTra]').val(data.ConTra);
        $('input[name=DirTra]').val(data.DirTra);
        $('input[name=TelTra]').val(data.TelTra);
        $('input[name=NexTra]').val(data.NexTra);
        $('input[name=EmaTra]').val(data.EmaTra);
        $('input[name=RfcTra]').val(data.RfcTra);
        $('textarea[name=ObsTra]').val(data.ObsTra);
    });
}