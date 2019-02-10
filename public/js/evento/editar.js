function editar(id) {
    //Modificar el titulo del modal
    $('.modal-title').text('Editar Localidad');
    //Modificar el titulo y color del boton del modal
    $('#btnCrear').val('Editar'); //.removeClass('btn-success').addClass('btn-info');*/
    //Modificar action del form
    $('#frmAgregar').attr('action', 'Localidad/actualizar/' + id);
    $.get('/Localidad/mostrar/' + id, function(data) {
        $('select[name=CliId]').find(":selected").attr("selected", false);
        $("select[name=CliId] option[value='" + data.CliId + "']").attr("selected", true);
        $('input[name=DesLoc]').val(data.DesLoc);
        $('textarea[name=IndLoc]').val(data.IndLoc);
        $('input[name=NomLoc]').val(data.NomLoc);
        $('input[name=ConLoc]').val(data.ConLoc);
        $('input[name=DirLoc]').val(data.DirLoc);
        $('input[name=TelLoc]').val(data.TelLoc);
        $('input[name=NexLoc]').val(data.NexLoc);
        $('input[name=EmaLoc]').val(data.EmaLoc);
        $('input[name=RfcLoc]').val(data.RfcLoc);
        $('input[name=DisLoc]').val(data.DisLoc);
        $('textarea[name=ObsLoc]').val(data.ObsLoc);
    });
}