function editar(id) {
    //Modificar el titulo del modal
    $('.modal-title').text('Editar Pago (Cxp)');
    //Modificar el titulo y color del boton del modal
    $('#btnCrear').val('Editar'); //.removeClass('btn-success').addClass('btn-info');*/
    //Modificar action del form
    $('#frmAgregar').attr('action', 'PagoCxp/actualizar/' + id);
    $.get('PagoCxp/mostrar/' + id, function(data) {
        $('input[name=NumPag]').val(data.NumPag);

        $('select[name=FacCxpNum]').find(":selected").attr("selected", false);
        $("select[name=FacCxpNum] option[value='" + data.FacCxpNum + "']").attr("selected", true);

        $('input[name=MonPag]').val(data.MonPag);
        $('input[name=FecPag]').val(data.FecPag);
        $('input[name=RefPag]').val(data.RefPag);
        $('textarea[name=ObsPag]').val(data.ObsPag);
    });

    /*Bloquear campos (MODIFICACION)
    $('select[name=FacCxpNum]').attr('disabled', 'true');
    $('input[name=MonPag]').attr('disabled', 'true');*/
}

/*Desbloquear campos para agregar registro*/
$('#btnAgregar').on('click', function() {
    $('select[name=FacCxpNum]').find(":selected").attr("selected", false);
    $('select[name=FacCxpNum]').removeAttr('disabled');
    $('input[name=MonPag]').removeAttr('disabled');
});