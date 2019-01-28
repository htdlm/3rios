$(document).ready(function() {
    var id = $('input[name=MovId]').val();
    //Modificar el titulo del modal
    $('h1').text('Editar Movimiento');
    //Modificar el titulo y color del boton del modal
    $('#btnRegistrar').val('Editar').removeClass('btn-success').addClass('btn-info');
    //Modificar action del form
    $('#frmAgregar').attr('action', 'Movimiento/actualizar/' + id);
    $.get('/Movimiento/mostrar/' + id, function(data) {
        console.log(data);
        /*Fechas*/
        $('input[name=FecAct]').val(data.FecAct);
        $('input[name=FecSer]').val(data.FecSer);
        $('input[name=FecSol]').val(data.FecSol);
        $('input[name=FecRea]').val(data.FecRea);
        /*Semanas*/
        $('input[name=SemSer]').val(data.SemSer);
        $('input[name=SemSol]').val(data.SemSol);
        $('input[name=SemRea]').val(data.SemRea);

        /*Traer el cliente*/
        cargarCliente(data.CliLocId);
        $('input[name=RefCli]').val(data.RefCli);
        /*Minigrip*/

        /*Unidades*/
        getUnidad(data.UniId);

        /*Adidcionales*/
        $('select[name=AdiId1]').find(':selected').attr('selected', false);
        $("select[name=AdiId1] option[value='" + data.AdiId1 + "']").attr('selected', true);

        /*Adidcionales*/
        $('select[name=AdiId2]').find(':selected').attr('selected', false);
        $("select[name=AdiId2] option[value='" + data.AdiId2 + "']").attr('selected', true);

        $('select[name=AdiId3]').find(':selected').attr('selected', false);
        $("select[name=AdiId3] option[value='" + data.AdiId3 + "']").attr('selected', true);

        /*Fase de movimiento*/
        $('select[name=FasMovId]').find(':selected').attr('selected', false);
        $("select[name=FasMovId] option[value='" + data.FasMovId + "']").attr('selected', true);

        /*Tarimas*/
        $('input[name=NumTar]').val(data.NumTar);

        /*Kilos brutos*/
        $('input[name=KilBru]').val(data.KilBru);

        /*Kilos netos*/
        $('input[name=KilNet]').val(data.KilNet);

        /*Factor Tarifa*/
        $('input[name=FacTar]').val(data.FacTar);

        /*Factor Total de la tarifa*/
        $('input[name=FacTarTot]').val(data.FacTarTot);

        /*Observaciones*/
        $('textarea[name=ObsMov]').text(data.ObsMov);
    });
    /*Mostramos las localidades que tiene el cliente*/
    function cargarCliente(id) {
        $.get('/Localidad/mostrar/' + id, function(data) {
            $('select[name=Cliente]').find(':selected').attr('selected', false);
            $("select[name=Cliente] option[value='" + data.CliId + "']").attr("selected", true);

            cargarLocalidades(data.CliId, id);
        });
    }

    function cargarLocalidades(idCliente, LocId) {
        $.get('/Localidades/mostrar/' + idCliente, function(data) {
            $('select[name=CliLocId').empty();
            $('select[name=CliLocId').append('<option value="">Seleccione una localidad</option>');
            var texto = "";

            for (var i = 0; i < data.length; i++) {
                if (data[i].LocId == LocId) {
                    texto = '<option selected="true" value="' + data[i].LocId + '">' + data[i].DesLoc + " - " + data[i].NomLoc + '</option>'
                } else {
                    texto = '<option value="' + data[i].LocId + '">' + data[i].DesLoc + " - " + data[i].NomLoc + '</option>'
                }
                $('select[name=CliLocId').append(texto);
            }
        });
    }

    function getUnidad(idUnidad) {
        $.get('/Unidad/mostrar/' + idUnidad, function(data) {
            $('select[name=TipUni]').find(":selected").attr("selected", false);
            $("select[name=TipUni] option[value='" + data.TipUniId + "']").attr("selected", true);
            /*Traida desde el archivo data.js*/
            getUnidades(data.TipUniId, idUnidad, 'editando');
        });
    }
});