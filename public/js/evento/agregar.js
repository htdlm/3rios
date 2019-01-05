$(document).ready(function() {
    $('.btnNuevo').on('click', function() {
        var data = jQuery.parseJSON($(this).attr('data-Evento'));
        console.log(data);
        llenarModal(data);
    });
});


function llenarModal(data) {
    $('input[name=MovId]').val(data.MovId);
    $('input[name=RefCli]').val(data.RefCli);
}