function editar(id) {
    //Modificar el titulo del modal
    $('.modal-title').text('Editar Pago (Cxc)');
    //Modificar el titulo y color del boton del modal
    $('#btnCrear').val('Editar'); //.removeClass('btn-success').addClass('btn-info');*/
    //Modificar action del form
    $('#frmAgregar').attr('action', 'PagoCxc/actualizar/' + id);
    $.get('PagoCxc/mostrar/' + id, function(data) {
        $('input[name=NumPag]').val(data.NumPag);

        $('select[name=FacCxcNum]').find(":selected").attr("selected", false);
        $("select[name=FacCxcNum] option[value='" + data.FacCxcNum + "']").attr("selected", true);

        $('input[name=MonPag]').val(data.MonPag);
        $('input[name=FecPag]').val(data.FecPag);
        $('input[name=RefPag]').val(data.RefPag);
        $('textarea[name=ObsPag]').val(data.ObsPag);
    });

    /*Bloquear campos (MODIFICACION)
    $('select[name=FacCxcNum]').attr('disabled', 'true');
    $('input[name=MonPag]').attr('disabled', 'true');*/
}

/*Desbloquear campos para agregar registro*/
$('#btnAgregar').on('click', function() {
    $('select[name=FacCxcNum]').find(":selected").attr("selected", false);
    $('select[name=FacCxcNum]').removeAttr('disabled');
    $('input[name=MonPag]').removeAttr('disabled');
});