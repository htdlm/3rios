function editar(id) {
    /*Bloquear movimiento SE CAMBIO*/
    //$('select[name=MovId]').attr('disabled', 'true');

    //Modificar el titulo del modal
    $('.modal-title').text('Editar Factura (Cxp)');
    //Modificar el titulo y color del boton del modal
    $('#btnCrear').val('Editar').removeClass('btn-success').addClass('btn-info');
    //Modificar action del form
    $('#frmAgregar').attr('action', '/FacturaCxp/actualizar/' + id);
    $.get('/FacturaCxp/mostrar/' + id, function(data) {
        $('input[name=FacCxpNum]').val(data.FacCxpNum);

        $('select[name=MovId]').find(":selected").attr("selected", false);
        $("select[name=MovId] option[value='" + data.MovId + "']").attr("selected", true);

        $('input[name=ConFac]').val(data.ConFac);

        $('input[name=FecCreFac]').val(data.FecCreFac);
        $('input[name=FecFac]').val(data.FecFac);
        $('input[name=FecPre]').val(data.FecPre);

        $('input[name=ImpFac]').val(data.ImpFac);
        $('input[name=IvaFac]').val(data.IvaFac);
        $('input[name=SubFac]').val(data.SubFac);
        $('input[name=RetFac]').val(data.RetFac);
        $('input[name=TotFac]').val(data.TotFac);
        $('input[name=SalFac]').val(data.SalFac);

        $('textarea[name=ObsFac]').val(data.ObsFac);
    });
}