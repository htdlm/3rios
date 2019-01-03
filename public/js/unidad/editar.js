function editar(id) {
    //Modificar el titulo del modal
    $('.modal-title').text('Editar Unidad');
    //Modificar el titulo y color del boton del modal
    $('#btnCrear').val('Editar').removeClass('btn-success').addClass('btn-info');
    //Modificar action del form
    $('#frmAgregar').attr('action', 'Unidad/actualizar/' + id);
    $.get('Unidad/mostrar/' + id, function(data) {
        $('input[name=DesUni]').val(data.DesUni);
        $('input[name=PlaUni]').val(data.PlaUni);

        $('select[name=TipUniId]').find(":selected").attr("selected", false);
        $("select[name=TipUniId] option[value='" + data.TipUniId + "']").attr("selected", true);

        $('input[name=ObsUni]').val(data.ObsUni);

        $('select[name=ClaId]').find(":selected").attr("selected", false);
        $("select[name=ClaId] option[value='" + data.ClaId + "']").attr("selected", true);
    });
}