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
    $('.modal-title').text('Editar Operador');
    //Modificar el titulo y color del boton del modal
    $('#btnCrear').val('Editar'); //.removeClass('btn-success').addClass('btn-info');*/
    //Modificar action del form
    $('#frmAgregar').attr('action', 'Operador/actualizar/' + id);
    $.get('Operador/mostrar/' + id, function(data) {
        $('input[name=DesOpe]').val(data.DesOpe);
        $('input[name=NomOpe]').val(data.NomOpe);
        $('input[name=DirOpe]').val(data.DirOpe);
        $('input[name=TelOpe]').val(data.TelOpe);
        $('input[name=EmaOpe]').val(data.EmaOpe);
        $('input[name=NexOpe]').val(data.NexOpe);
        $('input[name=NssOpe]').val(data.NssOpe);
        $('input[name=ConEmeOpe]').val(data.ConEmeOpe);
        $('input[name=TelEmeOpe]').val(data.TelEmeOpe);
        $('textarea[name=ObsOpe]').val(data.ObsOpe);

        $('select[name=ClaId]').find(":selected").attr("selected", false);
        $("select[name=ClaId] option[value='" + data.ClaId + "']").attr("selected", true);
    });
}