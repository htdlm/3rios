$(document).ready(function() {
    $('#btnBuscar').on('click', function() {
        buscar();
    });
});


function buscar() {
    //Se busca por localidad de cliente
    var idLocCliente = $('select[name=CliLocId]').find(":selected").val();
    var minigrip = "";
    minigrip = $('input[name=RefCli]').val();

    if (minigrip != "") {
        window.open('/Eventos/minigrip/' + minigrip);
    } else {
        window.open('/Eventos/localidad/' + idLocCliente);
    }
}