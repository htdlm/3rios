$(document).ready(function() {
    cargarLocalidades(1);
});

//Lenar select de localidades
$('select[name=CliId]').on('change', function() {
    var id = $(this).val();
    cargarLocalidades(id);
});


//Funciones al cambiar el cliente
function cargarLocalidades(id) {
    $.get('/Localidades/mostrar/' + id, function(data) {
        $('select[name=CliLocId').empty();
        var texto = "";

        for (var i = 0; i < data.length; i++) {
            texto = '<option value="' + data[0].LocId + '">' + data[0].DesLoc + " - " + data[0].NomLoc + '</option>'
            $('select[name=CliLocId').append(texto);
        }
    });
}