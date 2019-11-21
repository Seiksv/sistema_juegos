<head>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300i,400" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="../rsc/css/tema_principal.css">
    <link rel="stylesheet" type="text/css" href="../rsc/css/style.css">
    <link rel="stylesheet" type="text/css"
        href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
    <?php 
//Incluyo los archivos que necesitare
  include_once("../rutas.php"); 
  include_once(USER_SESSION);
  include_once(EJERCICIOS);
  include_once(MODELOS."niveles.php");


//Instancio las clases
$userSession = new UserSession();   
$niveles = new Niveles();
$ejercicio = new ejercicios;
  //Obtengo los niveles

$niveles_juego = $niveles->getNiveles();
$niveles_usuario = $niveles->getNivelesUser($userSession->getCurrentUser());




  ?>
</head>

<body>
    <?php
  //Inserto el menu lateral
  include_once("assets/menu_lateral.php");
  include_once(CONTROLADORES."niveles.php");
  ?>

    <div class="container">
        <?php 
        //Inicializo $html 
            $html="";
            $i=0;
            //print_r($niveles_usuario);
            //Recorro el arrego de niveles
            foreach ($niveles_juego as $nivel) {
             
              //Si el iterador es menor que la cantidad de niveles se ejecuta :v
              if ($i<count($niveles_usuario)) {

                //Saco el porcentaje para obtener los pixeles que tiene la barra indicadora de cada ejercicio
                $barra_porcentaje = (((($niveles_usuario[$i][5])*100)/$niveles_usuario[$i][9]) * 250)/100;

                //Si el porcentaje es igual que el ancho total de la card o si el estado del juego es finalizado entonces se ejecuta
                if($barra_porcentaje == 250 or $niveles_usuario[$i][9] == "si")
                {
                  $felicitaciones = "Nivel Completo :D";
                  $boton_jugar ="<a href='#popup-article' class='rainbow-button' alt='Volver a jugar' style='font-size:1.2vw' onclick='identificador_nivel(".$nivel['idJuego'].")'></a>";
                }
                //Sino se muestran mensajes para que lo intentes :D
                else{
                  $felicitaciones = "";
                  $boton_jugar = "<a href='#popup-article' class='rainbow-button' alt='Intentar' onclick='identificador_nivel(".$nivel['idJuego'].")'></a>
                 
                  ";
                }
      
                $i++;
              }
              else
              {
                $barra_porcentaje=0;
                $felicitaciones = "";
                $boton_jugar = "<a href='#popup-article' class='rainbow-button' alt='Intentar' onclick='identificador_nivel(".$nivel['idJuego'].")'></a>";
              }
            
              //Los almaceno en $html
            $html .='
            <div class="card" id="id_'.$nivel['idJuego'].'" onmouseover="hover_card('.$barra_porcentaje.')">
              <h3 class="title" style="color:white">'.$nivel['nombre'].'</h3>
              <div class="bar">
                <div class="emptybar"></div>
                <div class="filledbar"></div>
              </div>
              
              <div class="circle">
              '.$felicitaciones.'
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg">
                <circle class="stroke" cx="60" cy="60" r="50"/>
              </svg>
              '.$boton_jugar.'
              </div>
            </div>
            ';
            }
            //Imprimo en pantalla
            echo $html;
          ?>
    </div>

   <!-- 
     <div id="popup-article" class="popup">
        <div class="popup__block">
            <div class="linkedin">
                <div class="linkedin__container">
                    <p class="linkedin__text">Nivel 1</p>
                </div>
            </div>
            <p>
                <h1 class="popup__title">Indicaciones</h1> Cuenta cuantos vegetales hay en cada recuadro y selecciona
                con ayuda del mouse el numero que indica la respuesta correcta.
            </p>
            <a href="#" class="popup__close">close</a>
        </div>
    </div>
    !-->
    
    <div id="popup-article" class="popup">
    <input type="hidden" id="identificador">
        <div class="popup__block">
            <div class="linkedin">
                <div class="linkedin__container">
                    <p class="linkedin__text">Nivel 2</p>
                </div>
            </div>
            <p>
                <h1 class="popup__title">Indicaciones</h1> Observa las siguientes figuras y responde las preguntas con ayuda del puntero.
            </p>
            <hr>
            <div class="text-center">

              <p>Cuantos petalos ves en esta flor?</p>
                <div style="display:inline-block">
                  <?= $ruta_imagen ?>
                </div>
                <br>
                <?php 
                //Si no esta el numero correcto en el array entonces se introduce manualmente
                if(!in_array("<input type='radio' name='ejercicio1' value='$numero_correcto' class='option-input radio'>".$numero_correcto."</input>", $array_numeros_incorrectos))
                {
                  //Se introduce el numero correcto para que siempre aparezca
                  array_push($array_numeros_incorrectos,"<input type='radio' name='ejercicio1' value='$numero_correcto' class='option-input radio'>".$numero_correcto."</input>");
                }
                //Se recorre el arreglo y se imprime
                foreach ($array_numeros_incorrectos as $key => $value) {
                echo $value;
                }
                ?>
            </div>
            <br><br>
            <hr>
            <div class="text-center">
              <p>Cuantos petalos tienen las dos flores juntas?</p>
              <div style="display:inline-block">
               
                <?= $ej2ruta_imagen ?>
                <?= $ruta_imagen ?>
                <div>
                <?php 
                //Si no esta el numero correcto en el array entonces se introduce manualmente
                if(!in_array("<input type='radio' name='ejercicio2' value='$ej2respuesta' class='option-input radio'>".$ej2respuesta."</input>", $ej2array_numeros_incorrectos))
                {
                  //Se introduce el numero correcto para que siempre aparezca
                  array_push($ej2respuesta,"<input type='radio' name='ejercicio2' value='$ej2respuesta' class='option-input radio'>".$ej2respuesta."</input>");
                }
                //Se recorre el arreglo y se imprime
                foreach ($ej2array_numeros_incorrectos as $key => $value) {
                echo $value;
                }
                ?>
              </div>
              </div>

              <br><br>
            <hr>
            <div class="text-center">
              
              <p>Cuantos petalos hay en total?</p>
              <div style="display:inline-block">
                <?= $ej3ruta_imagen ?>
                <?= $ruta_imagen ?>
                <?= $ej2ruta_imagen ?>
               
                <div>
                <?php 
                //Si no esta el numero correcto en el array entonces se introduce manualmente
                if(!in_array("<input type='radio' name='ejercicio3' value='$ej3respuesta' class='option-input radio'>".$ej3respuesta."</input>", $ej3array_numeros_incorrectos))
                {
                  //Se introduce el numero correcto para que siempre aparezca
                  array_push($ej3array_numeros_incorrectos,"<input type='radio' name='ejercicio3' value='$ej3respuesta' class='option-input radio'>".$ej3respuesta."</input>");
                }
                //Se recorre el arreglo y se imprime
                foreach ($ej3array_numeros_incorrectos as $key => $value) {
                echo $value;
                }
                ?>
              </div>
          <div><button onclick="calificarniv2($('#identificador').val(),$('input:radio[name=ejercicio1]:checked').val(),$('input:radio[name=ejercicio2]:checked').val(),$('input:radio[name=ejercicio3]:checked').val())">Enviar :D</button></div>
            <a href="#" class="popup__close">close</a>
            
        </div>
    </div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../rsc/js/jquery-3.4.1.js"></script>
    <script src="../rsc/js/popper.min.js"></script>
    <script src="../rsc/js/bootstrap.min.js"></script>

    <script>
      function identificador_nivel(id){
        alert(id);
        $("#identificador").val(id);
      }
    function calificarniv2(nivel, val1,val2,val3){
      var puntaje = 0;
      if (val1 != null && val2 != null && val3 != null ) {
        if(val1 == <?= $ej1respuesta; ?>){
          puntaje = puntaje +1;
        }
        if(val2 == <?= $ej2respuesta; ?>){
          puntaje = puntaje +1;
        }
        if(val3 == <?= $ej3respuesta; ?>){
          puntaje = puntaje +1;
        }

        
        var jqxhr = $.post( "assets/ejercicios_ajax.php",{accion:"insertar",puntaje:puntaje,nivel:nivel,usuario:'<?= $userSession->getCurrentUser(); ?>'}, function() {
              }).done(function(data ) {
                alert(data); 
                })
                .fail(function() {
                  alert( "error" );
                })
              
      }
      else{
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
</body>