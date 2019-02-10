$(document).ready(function() {
    $('#btnBuscar').on('click', function() {
        buscar();
    });

    $('input[name=RefCli]').keyup(function() {
        if ($(this).val() != '') {
            $('select[name=CliId]').attr('disabled', true);
            $('select[name=CliLocId]').attr('disabled', true);
        } else {
            $('select[name=CliId]').attr('disabled', false);
            $('select[name=CliLocId]').attr('disabled', false);
        }
    });
});


function buscar() {
    //Se busca por localidad de cliente
    var idLocCliente = $('select[name=CliLocId]').find(":selected").val();
    var minigrip = "";
    minigrip = $('input[name=RefCli]').val();

    if (minigrip != "") {
        window.location = '/Eventos/minigrip/' + minigrip;
    } else {
        window.location = '/Eventos/localidad/' + idLocCliente;
    }
}