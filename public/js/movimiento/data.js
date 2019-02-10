  /*Variables para calcular el total*/
  var adi1 = 0;
  var adi2 = 0;
  var adi3 = 0;

  $(document).ready(function() {

      /*Cargar localidades y tipo de unidades del clientes, Como se
      cargan todos los clientes, se empieza por el primero
      podemos camboarlo y al hacerle click agregando un option
      de 'Seleccione una opcion'*/
      cargarLocalidades(1);
      getTipoUnidades(1);
  });

  /*Llenar select de localidades y tipos de unidades en base al cliente*/
  $('select[name=Cliente]').on('change', function() {
      var id = $(this).val();
      cargarLocalidades(id);
      getTipoUnidades(id);

      //Limpiar unidades y factor tarifa
      $('#unidad').empty();
      $('input[name=FacTar]').val("");
  });

  /*traer tipo de unidades al que tiene derecho pedir servicio cada cliente seleccionado*/
  function getTipoUnidades(idCliente) {
      $.get('/TipoUnidad/mostrar/tipo/' + idCliente, function(data) {
          $('#tipoUnidad').empty();
          var texto = '<option> Selecciona una opcion </option>';
          $('#tipoUnidad').append(texto);
          for (var i = 0; i < data.length; i++) {
              texto = '<option value="' + data[i].TipUniId + '">' + data[i].DesTipUni + '</option>'
              $('#tipoUnidad').append(texto);
          }
      });
  }


  //Tarifas del cliente, dependiendo del tipo de unidad
  function getTarifa(idCliente, tipo) {
      $.get('/TarifaCliente/mostrar/' + idCliente + '/' + tipo, function(data) {
          $('input[name=FacTar]').val(data);
          /*Cuando se llene desde abajo y el ultimo campo en llenar sea
          el tipo de unidad*/
          operar();
      });
  }

  //Operar kilos brutos con Tarimas
  $('input[name=NumTar]').on('change', function() {
      if ($('input[KilBru]').val() != "") {
          operar();
          var tipo = $('select[name=TipUni]').find(':selected').val();
          validarPeso(tipo);
      }
  });

  /*Operar kilos brutos*/
  $('input[name=KilBru]').on('change', function() {
      if ($('input[name=NumTar]').val() != "") {
          operar();
          var tipo = $('select[name=TipUni]').find(':selected').val();
          validarPeso(tipo);
      } else {
          alert('Agregue un numero de Tarimas para calcular el total de kilos')
      }
  });

  /*Mostramos las localidades que tiene el cliente*/
  function cargarLocalidades(id) {
      $.get('/Localidades/mostrar/' + id, function(data) {
          $('select[name=CliLocId').empty();
          $('select[name=CliLocId').append('<option value="">Seleccione una localidad</option>');
          var texto = "";

          for (var i = 0; i < data.length; i++) {
              texto = '<option value="' + data[i].LocId + '">' + data[i].DesLoc + " - " + data[i].NomLoc + '</option>'
              $('select[name=CliLocId').append(texto);
          }
      });
  }

  //Calcular kilos Netos y factor total
  function operar() {
      var tarimas = parseFloat($('input[name=NumTar]').val());
      var kilbrutos = parseFloat($('input[name=KilBru]').val());
      var kilNetos = parseFloat((tarimas * 1.2) + kilbrutos);
      var tarifa = parseFloat($('input[name=FacTar]').val())
      var totalTarifa = parseFloat(kilNetos * tarifa);
      if (adi1 != 0) {
          totalTarifa += adi1;
      }
      if (adi2 != 0) {
          totalTarifa += adi2;
      }
      if (adi3 != 0) {
          totalTarifa += adi3;
      }

      $('input[name=KilNet]').val(kilNetos);
      $('input[name=FacTarTot]').val(totalTarifa.toFixed(4));
  }

  /*Si cambia FacTar operar*/
  $('input[name=FacTar]').on('change', function() {
      operar();
  });

  /* Al cambiar el select de tipos*/
  $('#tipoUnidad').on('change', function() {
      var cliente = $('select[name=Cliente]').val();
      var tipo = $(this).val();

      /*Cargar tarifas depende del tipo de unidad y
      cargar todas las unidades dependiendo de ese tipo*/
      getTarifa(cliente, tipo);
      getUnidades(tipo);
  });

  /*Dependiento del tipo de unidad al que tiene derecho
  cada cliente */
  function getUnidades(idTipo, idUnidad, editando) {
      //Limpiar unidades y llenar
      $('#unidad').empty();
      $.get('/Unidad/mostrar/tipo/' + idTipo, function(data) {
          var texto = "";
          for (var i = 0; i < data.length; i++) {
              texto = '<option value="' + data[i].UniId + '">' + data[i].DesUni + '(' + data[i].PlaUni + ')</option>'
              $('#unidad').append(texto);
          }
          /*Desde archivo editar.js para llenar automaticamente la unidad
          Aqui especificamente no se usa*/
          if (editando == 'editando') {
              $('select[name=UniId]').find(":selected").attr("selected", false);
              $("select[name=UniId] option[value='" + idUnidad + "']").attr("selected", true);
          }
      });
  }


  /*Comprobar que kilos y tipo de transporte coincidan*/
  function validarPeso(idTipo) {
      $.get('/TipoUnidad/mostrar/' + idTipo, function(data) {
          var kilos = parseInt($('input[name=KilNet]').val());
          kilos = kilos / 1000;
          if (kilos > data.CapMaxUni) {
              alert('El tipo de unidad no es el adecuado para la cantidad de peso');
              $('input[name=KilBru]').val("");
          }
      });
  }

  /* Calcular adicionales INPUTS*/
  $('input[name=AdiValId1]').on('change', function() {
      if ($(this).val() != '' && $('select[name=AdiId1]').val() != '0') {
          var costoAdi1 = parseFloat($('select[name=AdiId1]').find(':selected').attr('data-costo'));
          var cantidad = parseFloat($(this).val());
          adi1 = parseFloat(costoAdi1 * cantidad);
          operar();
      }
  });

  $('input[name=AdiValId2]').on('change', function() {
      if ($(this).val() != '' && $('select[name=AdiId2]').val() != '0') {
          var costoAdi2 = parseFloat($('select[name=AdiId2]').find(':selected').attr('data-costo'));
          var cantidad = parseFloat($(this).val());
          adi2 = parseFloat(costoAdi2 * cantidad);
          operar();
      }
  });

  $('input[name=AdiValId3]').on('change', function() {
      if ($(this).val() != '' && $('select[name=AdiId3]').val() != '0') {
          var costoAdi3 = parseFloat($('select[name=AdiId3]').find(':selected').attr('data-costo'));
          var cantidad = parseFloat($(this).val());
          adi3 = parseFloat(costoAdi3 * cantidad);
          operar();
      }
  });

  /*En cualquier select adicional tratar de operar*/
  $('select[name=AdiId1]').on('change', function() {
      if ($(this).val() != '0') {
          var costoAdi1 = parseFloat($(this).find(':selected').attr('data-costo'));
          var cantidad = parseFloat($('input[name=AdiValId1]').val());
          adi1 = parseFloat(costoAdi1 * cantidad);
      } else {
          adi1 = 0;
      }
      operar();
  });

  $('select[name=AdiId2]').on('change', function() {
      if ($(this).val() != '0') {
          var costoAdi2 = parseFloat($(this).find(':selected').attr('data-costo'));
          var cantidad = parseFloat($('input[name=AdiValId2]').val());
          adi2 = parseFloat(costoAdi2 * cantidad);
      } else {
          adi2 = 0;
      }
      operar();
  });

  $('select[name=AdiId3]').on('change', function() {
      if ($(this).val() != '0') {
          var costoAdi3 = parseFloat($(this).find(':selected').attr('data-costo'));
          var cantidad = parseFloat($('input[name=AdiValId3]').val());
          adi3 = parseFloat(costoAdi3 * cantidad);
      } else {
          adi3 = 0;
      }
      operar();
  });