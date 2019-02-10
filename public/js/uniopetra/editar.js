function editar(id) {
    //Modificar el titulo del modal
    $('.modal-title').text('Editar Registro');
    //Modificar el titulo y color del boton del modal
    $('#btnCrear').val('Editar'); //.removeClass('btn-success').addClass('btn-info');*/
    //Modificar action del form
    $('#frmAgregar').attr('action', 'UniOpeTra/actualizar/' + id);
    $.get('UniOpeTra/mostrar/' + id, function(data) {
        $('select[name=UniId]').find(":selected").attr("selected", false);
        $("select[name=UniId] option[value='" + data.UniId + "']").attr("selected", true);

        $('select[name=OpeId]').find(":selected").attr("selected", false);
        $("select[name=OpeId] option[value='" + data.OpeId + "']").attr("selected", true);

        $('select[name=TraId]').find(":selected").attr("selected", false);
        $("select[name=TraId] option[value='" + data.TraId + "']").attr("selected", true);

        $('input[name=CosUniOpeTra]').val(data.CosUniOpeTra);


        $('textarea[name=ObsUniOpeTra]').val(data.ObsUniOpeTra);
    });
}

var idUnidad;
/*Bloquear unidad y transportista para editar*/
$('.btnEditar').on('click', function() {
    $('select[name=UniId]').attr('disabled', 'true');
});

/*Una unidad solo pertenece a un transportista
Cuando se selecciona una unidad el transportista debe quedar intacto*/
$('#btnAgregar').on('click', function() {
    $('select[name=UniId]').find(":selected").attr("selected", false);
    /*Si se ha presionado editar antes*/
    $('select[name=UniId]').removeAttr('disabled');
    /*Bloquear transportistas porque se definio desde
    el catalogo de unidades*/
    $('select[name=TraId]').attr('disabled', 'true');


    idUnidad = $('select[name=UniId]').find(":selected").val();
    getTransportista(idUnidad);
});

/*Cuando se selecciona una unidad debe
mostrar automaticamente el transportista*/
$('select[name=UniId]').on('change', function() {
    idUnidad = $(this).val();
    getTransportista(idUnidad);
});


function getTransportista(idUnidad) {

    /*Traer el transportista*/
    $.get('Unidad/mostrar/' + idUnidad, function(data) {
        $('select[name=TraId]').find(":selected").attr("selected", false);
        $("select[name=TraId] option[value='" + data.TraId + "']").attr("selected", true);
    });
}