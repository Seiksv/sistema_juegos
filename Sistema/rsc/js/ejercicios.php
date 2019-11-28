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
  function calificarnivel5(nivel, res1, ej1val1, ej1val2,ej1res,res2, ej2val1, ej2val2,ej2res,res3, ej3val1, ej3val2,ej3res){
   // alert(nivel+ res1+ ej1val1+ ej1val2+ej1res+res2+ ej2val1+ ej2val2+ej2res+res3+ ej3val1+ ej3val2+ej3res);
    var puntaje=0;
    var res=0;
    if (res1 != null && ej1val1 != null && ej1val2 != null && ej1res != null && res2 != null && ej2val1 != null && ej2val2 != null && ej2res != null && res3 != null && ej3val1 != null && ej3val2 != null && ej3res != null) {
    if (res1 == 8 ) {
        puntaje = puntaje + 1;
      }
      if (res2 ==  4) {
        puntaje = puntaje + 1;
      }
      if (res3 == 10) {
        puntaje = puntaje + 1;
      }
      
      if (ej1res ==8) {

        puntaje = puntaje + 1;
      }
     
      if (ej2res == 4 ) {
        puntaje = puntaje + 1;
      }
      
      if (ej3res == 10) {
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

  function cronometro (activo){
    $("#boton_nivel6").attr("disabled", false);
   
          
        
     
        var defaults = {}
      , one_second = 1000
      , one_minute = one_second * 60
      , one_hour = one_minute * 60
      , one_day = one_hour * 24
      , startDate = new Date()
      , face = document.getElementById('lazy');

    // http://paulirish.com/2011/requestanimationframe-for-smart-animating/
    var requestAnimationFrame = (function() {
      return window.requestAnimationFrame       || 
            window.webkitRequestAnimationFrame || 
            window.mozRequestAnimationFrame    || 
            window.oRequestAnimationFrame      || 
            window.msRequestAnimationFrame     || 
            function( callback ){
              window.setTimeout(callback, 1);
            };
    }());

 
      
         
    
          tick();
        
    

    function tick() {
      
      var now = new Date()
        , elapsed = now - startDate
        , parts = [];
 
      parts[0] = '' + Math.floor( elapsed / one_hour );
      parts[1] = '' + Math.floor( (elapsed % one_hour) / one_minute );
      parts[2] = '' + Math.floor( ( (elapsed % one_hour) % one_minute ) / one_second );
      parts[0] = (parts[0].length == 1) ? '0' + parts[0] : parts[0];
      parts[1] = (parts[1].length == 1) ? '0' + parts[1] : parts[1];
      parts[2] = (parts[2].length == 1) ? '0' + parts[2] : parts[2];
     
      face.innerText = parts.join(':');
    
      
       if(parts[1] >= 3){
      
        Swal.fire({
          title: 'Llegaste tarde',
          text: "Quieres volver a jugar?!",
          icon: 'error',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si, por favor!'
        }).then((result) => {
          if (result.value) {
            Swal.fire(
              location.reload(true)
            )
          }
        });
        $("#boton_nivel6").attr("disabled", true);
        }
        else if(parts[1] < 5){
          requestAnimationFrame(tick);
        }
       
      
      
    }

  }
  function calificarnivel6(nivel){
      enviar_puntaje(1,nivel);
      window.location.replace("puntajes.php");

  }
  function cronometro2 (activo){
    $("#boton_nivel7").attr("disabled", false);
   
          
        
     
        var defaults = {}
      , one_second = 1000
      , one_minute = one_second * 60
      , one_hour = one_minute * 60
      , one_day = one_hour * 24
      , startDate = new Date()
      , face = document.getElementById('lazy2');

    // http://paulirish.com/2011/requestanimationframe-for-smart-animating/
    var requestAnimationFrame = (function() {
      return window.requestAnimationFrame       || 
            window.webkitRequestAnimationFrame || 
            window.mozRequestAnimationFrame    || 
            window.oRequestAnimationFrame      || 
            window.msRequestAnimationFrame     || 
            function( callback ){
              window.setTimeout(callback, 1);
            };
    }());

 
      
         
    
          tick();
        
    

    function tick() {
      
      var now = new Date()
        , elapsed = now - startDate
        , parts = [];
 
      parts[0] = '' + Math.floor( elapsed / one_hour );
      parts[1] = '' + Math.floor( (elapsed % one_hour) / one_minute );
      parts[2] = '' + Math.floor( ( (elapsed % one_hour) % one_minute ) / one_second );
      parts[0] = (parts[0].length == 1) ? '0' + parts[0] : parts[0];
      parts[1] = (parts[1].length == 1) ? '0' + parts[1] : parts[1];
      parts[2] = (parts[2].length == 1) ? '0' + parts[2] : parts[2];
     
      face.innerText = parts.join(':');
    
      
       if(parts[1] >= 3){
      
        Swal.fire({
          title: 'Llegaste tarde',
          text: "Quieres volver a jugar?!",
          icon: 'error',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si, por favor!'
        }).then((result) => {
          if (result.value) {
            Swal.fire(
              location.reload(true)
            )
          }
        });
        $("#boton_nivel7").attr("disabled", true);
        }
        else if(parts[1] < 5){
          requestAnimationFrame(tick);
        }
       
      
      
    }

  }
  function calificarnivel7(nivel){
      enviar_puntaje(1,7);
      setTimeout(window.location.replace("puntajes.php"),10);
      

  }
  function calificarnivel1(nivel, val1, val2){
  var puntaje =0;
    if (val1 != null && val2 != null) {
      
      if (val1 == 5) {
        puntaje = puntaje + 1;
      }
      if (val2 == 6) {
        puntaje = puntaje + 1;
      }
      enviar_puntaje(puntaje,nivel);

    }
  }
  function calificarnivel8(nivel, val1, val2, val3, val4, val5,val6,val7,val8,val9,val10,val11,val12,val13,val14,val15){
  var puntaje =0;
    if (val4 != null && val8 != null && val14 != null) {
      
 
      if (val4 == 15) {
        puntaje = puntaje + 1;
      }
      if (val8 == 7) {
        puntaje = puntaje + 1;
      }
      if (val14 == 16) {
        puntaje = puntaje + 1;
      }
      if (val15 == 9) {
        puntaje = puntaje + 1;
      }
      
      
      enviar_puntaje(puntaje,nivel);

    }
  }
  function calificarnivel9(nivel, val1, val2, val3, val4){
  var puntaje =0;
    if (val1 != null && val2 != null && val3 != null && val4 != null) {
      
 
      if (val1 == 14) {
        puntaje = puntaje + 1;
      }
      if (val2 == 25) {
        puntaje = puntaje + 1;
      }
      if (val3 == 17) {
        puntaje = puntaje + 1;
      }
      if (val4 == 18) {
        puntaje = puntaje + 1;
      }
      
      
      enviar_puntaje(puntaje,nivel);

    }
  }
  function calificarnivel10(nivel, val1, val2, val3, val4){
  var puntaje =0;
    if (val1 != null && val2 != null && val3 != null && val4 != null) {
      
 
      if (val1 == 118) {
        puntaje = puntaje + 1;
      }
      if (val2 == 132) {
        puntaje = puntaje + 1;
      }
      if (val3 == 103) {
        puntaje = puntaje + 1;
      }
      if (val4 == 68) {
        puntaje = puntaje + 1;
      }
      
      
      enviar_puntaje(puntaje,nivel);

    }
  }
  function no_permiso(){
    Swal.fire({
                     icon: 'error',
                     title: 'No tienes acceso a este juego :C',
                     html: '<p style=`text-size:20px`>Avanza hasta completar al 100% el nivel anterior para desbloquear este!</p>',
                     footer: '<a href>¿Más información? Preguntale a tu profe!</a>'
                   })
  }
  </script>