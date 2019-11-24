<head>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300i,400" rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="../rsc/css/tema_principal.css">
  <link rel="stylesheet" type="text/css" href="../rsc/css/style.css">
  <link rel="stylesheet" type="text/css" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
  <?php
  //Incluyo los archivos que necesitare
  include_once("../rutas.php");
  include_once(BASE_DATOS);

  include_once(USER_SESSION);
  include_once(EJERCICIOS);
  include_once(MODELOS . "niveles.php");


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
  include_once(CONTROLADORES . "niveles.php");
  ?>

  <div class="container" style="left: calc(32% - 300px)">
    <?php
    //Inicializo $html 
    $html = "";
    $i = 0;
    // print_r($niveles_usuario);
    //print_r($niveles_juego);
   
    //Recorro el arrego de niveles

    foreach ($niveles_juego as $nivel) {
      $barra_porcentaje = 0;
      $barra_porcentaje = (((($niveles_juego[$i]['aciertos'])*100)/$niveles_juego[$i]['ejercicios']) * 250)/100;
        //echo ($niveles_usuario);
        //echo "Nivel id : ".$nivel['idJuego']."Nivel usuario ".$niveles_usuario[$i][7];
        //Si el porcentaje es igual que el ancho total de la card o si el estado del juego es finalizado entonces se ejecuta
        if ($nivel['finalizado'] == "si") {
          
          $felicitaciones = "Nivel Completo :D";
          $boton_jugar = "<a href='#ejercicio" . ($i + 1) . "' class='rainbow-button' alt='Volver a jugar' style='font-size:1.2vw' onclick='identificador_nivel(" . $nivel['idJuego'] . ")'></a>";
        }
        //Sino se muestran mensajes para que lo intentes :D
        else {
          $felicitaciones = "";
          $boton_jugar = "<a href='#ejercicio" . ($i + 1) . "' class='rainbow-button' alt='Intentar' onclick='identificador_nivel(" . $nivel['idJuego'] . ")'></a>   
                  ";
        }
     
      //Los almaceno en $html
      $html .= '
            <div class="card" id="id_' . $nivel['idJuego'] . '" onmouseover="hover_card(' . $barra_porcentaje . ')">
              <h3 class="title" style="color:white">'.$nivel['nombre'] . '</h3>
              <div class="bar">
                <div class="emptybar"></div>
                <div class="filledbar"></div>
              </div>
              
              <div class="circle">
              ' . $felicitaciones . '
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg">
                <circle class="stroke" cx="60" cy="60" r="50"/>
              </svg>
              ' . $boton_jugar . '
              </div>
            </div>
            ';
      $i++;
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

  <div id="ejercicio2" class="popup popup-article">
    <input type="hidden" id="identificador">
    <div class="popup__block">
      <div class="linkedin">
        <div class="linkedin__container">
          <p class="linkedin__text">Nivel 2</p>
        </div>
      </div>
      <p>
        <h1 class="popup__title">Indicaciones</h1> Observa las siguientes figuras y responde las preguntas con
        ayuda del puntero.
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
        if (!in_array("<input type='radio' name='ejercicio1' value='$numero_correcto' class='option-input radio'>" . $numero_correcto . "</input>", $array_numeros_incorrectos)) {
          //Se introduce el numero correcto para que siempre aparezca
          array_push($array_numeros_incorrectos, "<input type='radio' name='ejercicio1' value='$numero_correcto' class='option-input radio'>" . $numero_correcto . "</input>");
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
            if (!in_array("<input type='radio' name='ejercicio2' value='$ej2respuesta' class='option-input radio'>" . $ej2respuesta . "</input>", $ej2array_numeros_incorrectos)) {
              //Se introduce el numero correcto para que siempre aparezca
              array_push($ej2respuesta, "<input type='radio' name='ejercicio2' value='$ej2respuesta' class='option-input radio'>" . $ej2respuesta . "</input>");
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
              if (!in_array("<input type='radio' name='ejercicio3' value='$ej3respuesta' class='option-input radio'>" . $ej3respuesta . "</input>", $ej3array_numeros_incorrectos)) {
                //Se introduce el numero correcto para que siempre aparezca
                array_push($ej3array_numeros_incorrectos, "<input type='radio' name='ejercicio3' value='$ej3respuesta' class='option-input radio'>" . $ej3respuesta . "</input>");
              }
              //Se recorre el arreglo y se imprime
              foreach ($ej3array_numeros_incorrectos as $key => $value) {
                echo $value;
              }
              ?>
            </div>
            <div>
              <button onclick="calificarniv2($('#identificador').val(),$('input:radio[name=ejercicio1]:checked').val(),$('input:radio[name=ejercicio2]:checked').val(),$('input:radio[name=ejercicio3]:checked').val())">Enviar
                :D</button></div>
            <a href="#" class="popup__close">close</a>

          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="ejercicio3" class="popup popup-article">
    <div class="popup__block">
      <div class="linkedin">
        <div class="linkedin__container">
          <p class="linkedin__text">Nivel 3</p>
        </div>
      </div>
      <p>
        <h1 class="popup__title">Indicaciones</h1>Observa las siguientes figuras y responde las preguntas con ayuda del puntero.
      </p>
      <hr>
      <div class="text-center ">
        <div class="mt-5">
          <p>Cuantos arboles plantados hay en total?</p>
          <img src='../rsc/img/nivel3/arbol.jpg' alt='' style=' margin-left: auto;margin-right: auto;margin-bottom:15px;display:inline-block;width:30%;'>
          <img src='../rsc/img/nivel3/arbol.jpg' alt='' style=' margin-left: auto;margin-right: auto;margin-bottom:15px;display:inline-block;width:30%;'>
          <img src='../rsc/img/nivel3/arbol.jpg' alt='' style=' margin-left: auto;margin-right: auto;margin-bottom:15px;display:inline-block;width:30%;'>
        </div>
        <div class="">
        <input type='radio' name='Niv3_ej1' value='3' class='option-input radio'>3
        <input type='radio' name='Niv3_ej1' value='1' class='option-input radio'>1
        <input type='radio' name='Niv3_ej1' value='9' class='option-input radio'>9
        <input type='radio' name='Niv3_ej1' value='5' class='option-input radio'>5
        <input type='radio' name='Niv3_ej1' value='2' class='option-input radio'>2
        </div>
        
      </div>
      <div class="text-center" style="margin-top:50px">
        <div class="">
          <hr>
          <p>Cuantos arboles plantados hay en total?</p>
          <img src='../rsc/img/nivel3/arbol.jpg' alt='' style=' margin-left: auto;margin-right: auto;margin-bottom:15px;display:inline-block;width:30%;'>
          <img src='../rsc/img/nivel3/arbol.jpg' alt='' style=' margin-left: auto;margin-right: auto;margin-bottom:15px;display:inline-block;width:30%;'>
          <img src='../rsc/img/nivel3/talado.jpg' alt='' style=' margin-left: auto;margin-right: auto;display:inline-block;width:30%;'>
        </div>
        <div>
        <input type='radio' name='Niv3_ej2' value='3' class='option-input radio'>3
        <input type='radio' name='Niv3_ej2' value='1' class='option-input radio'>1
        <input type='radio' name='Niv3_ej2' value='9' class='option-input radio'>9       
        <input type='radio' name='Niv3_ej2' value='5' class='option-input radio'>5
        <input type='radio' name='Niv3_ej2' value='2' class='option-input radio'>2
        </div>
      </div>
      <div class="text-center" style="margin-top:50px">
        <div class="">
          <hr>
          <p>Cuantos arboles plantados hay en total?</p>
          <img src='../rsc/img/nivel3/arbol.jpg' alt='' style=' margin-left: auto;margin-right: auto;margin-bottom:15px;display:inline-block;width:30%;'>
          <img src='../rsc/img/nivel3/talado.jpg' alt='' style=' margin-left: auto;margin-right: auto;display:inline-block;width:30%;'>          
          <img src='../rsc/img/nivel3/talado.jpg' alt='' style=' margin-left: auto;margin-right: auto;display:inline-block;width:30%;'>
        </div>
        <div>
        <input type='radio' name='Niv3_ej3' value='3' class='option-input radio'>3
        <input type='radio' name='Niv3_ej3' value='1' class='option-input radio'>1
        <input type='radio' name='Niv3_ej3' value='9' class='option-input radio'>9       
        <input type='radio' name='Niv3_ej3' value='5' class='option-input radio'>5
        <input type='radio' name='Niv3_ej3' value='2' class='option-input radio'>2
        </div>
      </div>
      <div class="text-center" style="margin-top:25px;">
      <button onclick="calificarniv2(3,$('input:radio[name=Niv3_ej1]:checked').val(),$('input:radio[name=Niv3_ej2]:checked').val(),$('input:radio[name=Niv3_ej3]:checked').val())">Enviar
          Enviar
        </button>
      </div>

      <a href="#" class="popup__close">close</a>
    </div>
  </div>

  <div id="ejercicio4" class="popup popup-article">
    <div class="popup__block">
      <div class="linkedin">
        <div class="linkedin__container">
          <p class="linkedin__text">Nivel 4</p>
        </div>
      </div>
      <p>
        <h1 class="popup__title">Indicaciones</h1>Observa las siguientes figuras y responde las preguntas con ayuda del puntero.
      </p>
      <hr>
      <div class="text-center ">
        <img src='../rsc/img/nivel4/ejercicio1.png' alt='' style=' margin-left: auto;margin-right: auto;display:inline-block;width:30%;'>
        = <input type="number" style="text-size:15px;width:50px;height:50px;" id="niv4_eje1">
      </div>
      <hr>
      <div class="text-center ">
        <img src='../rsc/img/nivel4/ejercicio2.png' alt='' style=' margin-left: auto;margin-right: auto;display:inline-block;width:30%;'>
        = <input type="number" style="text-size:15px;width:50px;height:50px;" id="niv4_eje2">
      </div>
      <hr>
      <div class="text-center ">
        <img src='../rsc/img/nivel4/ejercicio3.png' alt='' style=' margin-left: auto;margin-right: auto;display:inline-block;width:30%;'>
        = <input type="number" style="text-size:15px;width:50px;height:50px;" id="niv4_eje3">
      </div>
      <hr>
      <div class="text-center ">
        <img src='../rsc/img/nivel4/ejercicio4.png' alt='' style=' margin-left: auto;margin-right: auto;display:inline-block;width:30%;'>
        = <input type="number" style="text-size:15px;width:50px;height:50px;" id="niv4_eje4">
      </div>
      <hr>
      <div class="text-center ">
        <img src='../rsc/img/nivel4/ejercicio5.png' alt='' style=' margin-left: auto;margin-right: auto;display:inline-block;width:30%;'>
        = <input type="number" style="text-size:15px;width:50px;height:50px;" id="niv4_eje5">
      </div>
      <hr>
      <div class="text-center ">
        <img src='../rsc/img/nivel4/ejercicio6.png' alt='' style=' margin-left: auto;margin-right: auto;display:inline-block;width:30%;'>
        = <input type="number" style="text-size:15px;width:50px;height:50px;" id="niv4_eje6">
      </div>
      <hr>
      <div class="text-center ">
        <img src='../rsc/img/nivel4/ejercicio7.png' alt='' style=' margin-left: auto;margin-right: auto;display:inline-block;width:30%;'>
        = <input type="number" style="text-size:15px;width:50px;height:50px;" id="niv4_eje7">
      </div>
      <hr>
      <div class="text-center ">
        <img src='../rsc/img/nivel4/ejercicio8.png' alt='' style=' margin-left: auto;margin-right: auto;display:inline-block;width:30%;'>
        = <input type="number" style="text-size:15px;width:50px;height:50px;" id="niv4_eje8">
      </div>
      <hr>
      <div class="text-center ">
        <img src='../rsc/img/nivel4/ejercicio9.png' alt='' style=' margin-left: auto;margin-right: auto;display:inline-block;width:30%;'>
        = <input type="number" style="text-size:15px;width:50px;height:50px;" id="niv4_eje9">
      </div>
      <hr>
      <div class="text-center" style="margin-top:25px;">
      <button onclick="calificarnivel4(4,$('#niv4_eje1').val(),$('#niv4_eje2').val(),$('#niv4_eje3').val(),$('#niv4_eje4').val(),$('#niv4_eje5').val(),$('#niv4_eje6').val(),$('#niv4_eje7').val(),$('#niv4_eje8').val(),$('#niv4_eje9').val())">Enviar
          Enviar
        </button>
      </div>

      <a href="#" class="popup__close">close</a>
    </div>
  </div>
  <div id="html_salida"></div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="../rsc/js/jquery-3.4.1.js"></script>
  <script src="../rsc/js/popper.min.js"></script>
  <script src="../rsc/js/bootstrap.min.js"></script>
  <script src="../rsc/js/sweetalert2.js"></script>
  
<?php
  include_once(EJERCICIOSJS);
  ?>


  <script>
   
  </script>
</body>