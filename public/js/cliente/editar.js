function editar(id) {
    //Modificar el titulo del modal
    $('.modal-title').text('Editar Cliente');
    //Modificar el titulo y color del boton del modal
    $('#btnCrear').val('Editar').removeClass('btn-success').addClass('btn-info');
    //Modificar action del form
    $('#frmAgregar').attr('action', '/Cliente/actualizar/' + id);
    $.get('/Cliente/mostrar/' + id, function(data) {
        $('input[name=NomCli]').val(data.NomCli);
        $('input[name=ConCli]').val(data.ConCli);
        $('input[name=LocCli]').val(data.LocCli);
        $('input[name=DirCli]').val(data.DirCli);
        $('input[name=TelCli]').val(data.TelCli);
        $('input[name=NexCli]').val(data.NexCli);
        $('input[name=EmaCli]').val(data.EmaCli);
        $('input[name=RfcCli]').val(data.RfcCli);
        $('input[name=DisCli]').val(data.DisCli);
        $('textarea[name=ObsCli]').val(data.ObsCli);
    });
}