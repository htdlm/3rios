function editar(id) {
    //Modificar el titulo del modal
    $('.modal-title').text('Editar Evidencia');
    //Modificar el titulo y color del boton del modal
    $('#btnCrear').val('Editar').removeClass('btn-success').addClass('btn-info');
    //Modificar action del form
    $('#frmAgregar').attr('action', 'Evidencia/actualizar/' + id);
    $.get('Evidencia/mostrar/' + id, function(data) {
        $('input[name=NumEvi]').val(data.NumEvi);

        $('select[name=MovId]').find(":selected").attr("selected", false);
        $("select[name=MovId] option[value='" + data.MovId + "']").attr("selected", true);

        $('input[name=DesEvi]').val(data.DesEvi);

        $('input[name=FecPre]').val(data.FecPre);
        $('input[name=FecRet]').val(data.FecRet);

        $('textarea[name=ObsEvi]').val(data.ObsEvi);
    });
}