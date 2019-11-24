<script>function identificador_nivel(id) {
    // alert(id);
    $("#identificador").val(id);
  }

function saca_puntaje3( val1, val2, val3){
var puntaje=0;
if (val1 == 3 ) {
        puntaje = puntaje + 1;
      }
      if (val2 == 2) {
        puntaje = puntaje + 1;
      }
      if (val3 == 1) {
        puntaje = puntaje + 1;
      }
     
      return puntaje;
}

  function calificarniv2(nivel, val1, val2, val3) {
    var puntaje = 0;

    
    if (val1 != null && val2 != null && val3 != null) {
      if(nivel==2){
      if (val1 == <?= $ej1respuesta ?> ) {
        puntaje = puntaje + 1;
      }
      if (val2 == <?= $ej2respuesta; ?>) {
        puntaje = puntaje + 1;
      }
      if (val3 == <?= $ej3respuesta; ?>) {
        puntaje = puntaje + 1;
      }
    } else if(nivel == 3){
     puntaje = saca_puntaje3(val1, val2, val3);
    }
    


      var jqxhr = $.post("assets/ejercicios_ajax.php", {
          accion: "insertar",
          puntaje: puntaje,
          nivel: nivel,
          usuario: '<?= $userSession->getCurrentUser(); ?>'
        }, function() {}).done(function(data) {
          if(data){
            $('#html_salida').html(data);
          }
        })
        .fail(function() {
          alert("error");
        })

    } else {
      alert("Marque todas las respuestas :D");
    }
  }
function enviar_puntaje(puntaje,nivel){
var jqxhr = $.post("assets/ejercicios_ajax.php", {
          accion: "insertar",
          puntaje: puntaje,
          nivel: nivel,
          usuario: '<?= $userSession->getCurrentUser(); ?>'
        }, function() {}).done(function(data) {
          $('#html_salida').html(data);
        })
        .fail(function() {
          alert("error");
        })
}

  function calificarnivel4(nivel, val1, val2, val3,val4,val5,val6,val7,val8,val9){
    var puntaje=0;
    if (val1 != null && val2 != null && val3 != null && val4 != null &&  val5 != null) {
    if (val1 == 4 ) {
        puntaje = puntaje + 1;
      }
      if (val2 == 6) {
        puntaje = puntaje + 1;
      }
      if (val3 == 2) {
        puntaje = puntaje + 1;
      }
      if (val4 == 8) {
        puntaje = puntaje + 1;
      }
      if (val5 == 3) {
        puntaje = puntaje + 1;
      }
      if (val6 == 7) {
        puntaje = puntaje + 1;
      }
      if (val7 == 0) {
        puntaje = puntaje + 1;
      }
      if (val8 == 2) {
        puntaje = puntaje + 1;
      }
      if (val9 == 1) {
        puntaje = puntaje + 1;
      }
      
      enviar_puntaje(puntaje,nivel);

    } else {
      alert("Marque todas las respuestas :D");
    }
  }
  //Funcion que controla el evento para pasar encima el mouse sobre el componente
  function hover_card(porciento) {
    $(".card").hover(function() {
      //Aca pongo el porcentaje calculado para obtener la distancia de la barra
      $('.filledbar', this).css({
        "width": porciento + "px"
      });
    }, function() {
      $('.filledbar', this).css({
        "width": "0px"
      });
    });
  }
  </script>