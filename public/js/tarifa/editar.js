function editar(id) {
    //Modificar el titulo del modal
    $('.modal-title').text('Editar Tarifa');
    //Modificar el titulo y color del boton del modal
    $('#btnCrear').val('Editar'); //.removeClass('btn-success').addClass('btn-info');*/
    //Modificar action del form
    $('#frmAgregar').attr('action', 'Tarifa/actualizar/' + id);
    $.get('Tarifa/mostrar/' + id, function(data) {
        $('select[name=CliId]').find(":selected").attr("selected", false);
        $("select[name=CliId] option[value='" + data.CliId + "']").attr("selected", true);

        $('select[name=TipUniId]').find(":selected").attr("selected", false);
        $("select[name=TipUniId] option[value='" + data.TipUniId + "']").attr("selected", true);

        $('select[name=TipSerId]').find(":selected").attr("selected", false);
        $("select[name=TipSerId] option[value='" + data.TipSerId + "']").attr("selected", true);


        $('input[name=TarTipUniCli]').val(data.TarTipUniCli);
        $('textarea[name=ObsTar]').val(data.ObsTar);
    });
}