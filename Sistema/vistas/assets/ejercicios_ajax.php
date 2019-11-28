<?php
  include_once("../../rutas.php"); 
  include_once(BASE_DATOS); 
  include_once(MODELOS."niveles.php");
  $niveles = new Niveles();



    if ($_SERVER['REQUEST_METHOD']=="POST") {
   
                $puntaje = $_POST['puntaje'];
                $nivel = $_POST['nivel'];
               // print_r($nivel);
                $usuario =$_POST['usuario'];
                $resultado = $niveles->getJuego($nivel);
                //print_r($resultado);
                $ejercicios = $resultado[0][2];
                $fallos =$ejercicios-$puntaje;
                //print_r($fallos);
                if ($fallos <= 0) {
                    $fallos=0;
                    $terminado = "si";
                }
                else
                {
                    $terminado = "no";
                }

                $resultado = $niveles->getAllJuegoxJugador($usuario,$nivel);
               // print_r($resultado);

                if (count($resultado)==0) {
                    $intentos=0;
                    $insercion = $niveles->insertar_nivel($usuario,$nivel,$intentos,$fallos,$puntaje,$terminado);
                    //print_r("Insertado");
                }
                else{
                    //$resultado
                   // print_r( $resultado);
                    $intentos = $resultado[0][3] + 1;
                    
                    $insercion = $niveles->actua_nivel($resultado[0][0],$intentos,$fallos,$puntaje,$terminado);
                   // print_r("Actualizado");
                   // print_r($insercion);
                  
                 if ($fallos==0 and $nivel<=9) {
                    $nivel = $nivel+1;
                    $activar_nivel = $niveles->activar_nivel($nivel,$usuario);
                 }
                 if ($fallos==0 and $nivel==10) {
                  $activar_trofeo = $niveles->activar_trofeo($usuario);
                  echo  "<script>
                  Swal.fire({
                      icon: 'info',
                      title: 'Felicidades has completado el juego al 100%',
                      text: 'Eres el mejor, No has hecho trampa ¿verdad?',
                      footer: '<a href>¿Más información? Preguntale a tu profe!</a>'
                    }).then((result) => {
                      if (result.value) {
                        window.location.replace('puntajes.php')
                      }
                    })</script>";
                  }
                else if($fallos==0 and $nivel ==3){
                       echo "<script>
                       Swal.fire({
                        icon: 'success',
                        title: 'Sabias que.',
                        html: '<p style=`text-size:20px`>Si el resultado con respecto a las cantidades de objetos aumenta estamos en presencia de una <strong>SUMA</strong> y se representa con ayuda del signo <strong>+</strong> que llamaremos <strong>“MAS”</strong> y el resultado final se representa con el signo <strong>=</strong> llamado <strong>“IGUAL”</strong>.</p><p>Si el resultado con respecto a las cantidades de objetos disminuye estamos en presencia de una <strong>RESTA</strong> y se representa con ayuda del signo <strong>-</strong> que llamaremos <strong>“MENOS”</strong> y el resultado final se representa con el signo <strong>=</strong> llamado <strong>“IGUAL”</strong>.</p>',
                        footer: '<a href>¿Más información? Preguntale a tu profe!</a>'
                      }).then((result) => {
                        if (result.value) {
                          window.location.replace('puntajes.php')
                        }
                      })
                      </script>";
                   }
                   else{
                    echo "<script>
                    Swal.fire({
                     icon: 'success',
                     title: 'Felicidades :D.',
                     html: '<p style=`text-size:20px`>Avanza en los siguientes niveles!</p>',
                     footer: '<a href>¿Más información? Preguntale a tu profe!</a>'
                   }).then((result) => {
                    if (result.value) {
                      window.location.replace('puntajes.php')
                    }
                  })
                   </script>";
                   }
                }
        
    }
    else
    return "Metodo POST, no detectado.";
?>
