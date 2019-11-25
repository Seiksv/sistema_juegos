<head>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300i,400" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="../rsc/css/tema_principal.css">
    <link rel="stylesheet" type="text/css" href="../rsc/css/style.css">
    <link rel="stylesheet" type="text/css" href="../rsc/fontawesome/css/all.css" rel="stylesheet">

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

  $niveles_juego = $niveles->getNiveles($userSession->getCurrentUser());
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
    $trofeo=0;
    foreach ($niveles_juego as $nivel) {
        
        if($niveles_juego[$i]['trofeo']=="si"){
            $trofeo = "<script>
            Swal.fire({
                icon: 'info',
                title: 'Felicidades has completado el juego al 100%',
                text: 'Eres el mejor, No has hecho trampa ¿verdad?',
                footer: '<a href>¿Más información? Preguntale a tu profe!</a>'
              })</script>";
        }
      $barra_porcentaje = 0;
      $barra_porcentaje = (((($niveles_juego[$i]['aciertos']) * 100) / $niveles_juego[$i]['ejercicios']) * 250) / 100;
      //echo ($niveles_usuario);
      //echo "Nivel id : ".$nivel['idJuego']."Nivel usuario ".$niveles_usuario[$i][7];
      //Si el porcentaje es igual que el ancho total de la card o si el estado del juego es finalizado entonces se ejecuta
      if ($nivel['finalizado'] == "si") {

        $felicitaciones = "<span style='color:white'>Nivel Completo :D</span>";
        $boton_jugar = "<a href='#ejercicio" . ($i + 1) . "' class='rainbow-button' alt='Volver a jugar' style='font-size:1.2vw' onclick='identificador_nivel(" . $nivel['idJuego'] . ")'></a>";
      }
      //Sino se muestran mensajes para que lo intentes :D
      else if($nivel['acceso']=='si'){
        $felicitaciones = "";
        $boton_jugar = "<a href='#ejercicio" . ($i + 1) . "' class='rainbow-button' alt='Intentar' onclick='identificador_nivel(" . $nivel['idJuego'] . ")'></a>   
                  ";
      }
      else if($nivel['acceso']=='no'){
        $felicitaciones = "";
        $boton_jugar = "<button class='rainbow-button' alt='No tienes acceso' onclick='no_permiso()'></button>   
                  ";
      }

      //Los almaceno en $html
      $html .= '
            <div class="card" id="id_' . $nivel['idJuego'] . '" onmouseover="hover_card(' . $barra_porcentaje . ')">
              <h3 class="title" style="color:white">' . $nivel['nombre'] . '</h3>
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


    <div id="ejercicio1" class="popup popup-article">
        <div class="popup__block">
            <div class="linkedin">
                <div class="linkedin__container">
                    <p class="linkedin__text">Nivel 1</p>
                </div>
            </div>

            <p>
                <h1 class="popup__title">Indicaciones</h1>Observa las siguientes figuras y responde las preguntas con
                ayuda del puntero.
            </p>
            <hr>
            <div class="text-center ">
                <img src='../rsc/img/nivel1/ej1/1.png' alt=''
                    style=' margin-left: auto;margin-right: auto;display:inline-block;width:10%;'>
                <img src='../rsc/img/nivel1/ej1/2.jpg' alt=''
                    style=' margin-left: auto;margin-right: auto;display:inline-block;width:10%;'>
                <img src='../rsc/img/nivel1/ej1/3.jpg' alt=''
                    style=' margin-left: auto;margin-right: auto;display:inline-block;width:10%;'>
                <img src='../rsc/img/nivel1/ej1/4.jpg' alt=''
                    style=' margin-left: auto;margin-right: auto;display:inline-block;width:10%;'>
                <img src='../rsc/img/nivel1/ej1/5.jpg' alt=''
                    style=' margin-left: auto;margin-right: auto;display:inline-block;width:10%;'>

            </div>
            <div class="text-center">
                <input type='radio' name='niv1_ej1' value='1' class='option-input radio'>1
                <input type='radio' name='niv1_ej1' value='3' class='option-input radio'>3
                <input type='radio' name='niv1_ej1' value='6' class='option-input radio'>6
                <input type='radio' name='niv1_ej1' value='5' class='option-input radio'>5
            </div>
            <hr>
            <div class="text-center ">
                <img src='../rsc/img/nivel1/ej2/1.png' alt=''
                    style=' margin-left: auto;margin-right: auto;display:inline-block;width:20%;'>
            </div>
            <div class="text-center">
                <input type='radio' name='niv1_ej2' value='1' class='option-input radio'>1
                <input type='radio' name='niv1_ej2' value='5' class='option-input radio'>5
                <input type='radio' name='niv1_ej2' value='3' class='option-input radio'>3
                <input type='radio' name='niv1_ej2' value='6' class='option-input radio'>6
                <div class="text-center" style="margin-top:25px;">
                    <button id="boton_nivel1"
                        onclick="calificarnivel1(1,$('input:radio[name=niv1_ej1]:checked').val(),$('input:radio[name=niv1_ej2]:checked').val())" class="bubbly-button">
                        Enviar
                    </button>
                </div>
            </div>
            <a href="#" class="popup__close">close</a>
        </div>
    </div>
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
                            <button class="bubbly-button"
                                onclick="calificarniv2(2,$('input:radio[name=ejercicio1]:checked').val(),$('input:radio[name=ejercicio2]:checked').val(),$('input:radio[name=ejercicio3]:checked').val())">Enviar
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
                <h1 class="popup__title">Indicaciones</h1>Observa las siguientes figuras y responde las preguntas con
                ayuda del puntero.
            </p>
            <hr>
            <div class="text-center ">
                <div class="mt-5">
                    <p>Cuantos arboles plantados hay en total?</p>
                    <img src='../rsc/img/nivel3/arbol.jpg' alt=''
                        style=' margin-left: auto;margin-right: auto;margin-bottom:15px;display:inline-block;width:30%;'>
                    <img src='../rsc/img/nivel3/arbol.jpg' alt=''
                        style=' margin-left: auto;margin-right: auto;margin-bottom:15px;display:inline-block;width:30%;'>
                    <img src='../rsc/img/nivel3/arbol.jpg' alt=''
                        style=' margin-left: auto;margin-right: auto;margin-bottom:15px;display:inline-block;width:30%;'>
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
                    <img src='../rsc/img/nivel3/arbol.jpg' alt=''
                        style=' margin-left: auto;margin-right: auto;margin-bottom:15px;display:inline-block;width:30%;'>
                    <img src='../rsc/img/nivel3/arbol.jpg' alt=''
                        style=' margin-left: auto;margin-right: auto;margin-bottom:15px;display:inline-block;width:30%;'>
                    <img src='../rsc/img/nivel3/talado.jpg' alt=''
                        style=' margin-left: auto;margin-right: auto;display:inline-block;width:30%;'>
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
                    <img src='../rsc/img/nivel3/arbol.jpg' alt=''
                        style=' margin-left: auto;margin-right: auto;margin-bottom:15px;display:inline-block;width:30%;'>
                    <img src='../rsc/img/nivel3/talado.jpg' alt=''
                        style=' margin-left: auto;margin-right: auto;display:inline-block;width:30%;'>
                    <img src='../rsc/img/nivel3/talado.jpg' alt=''
                        style=' margin-left: auto;margin-right: auto;display:inline-block;width:30%;'>
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
                <button class="bubbly-button"
                    onclick="calificarniv2(3,$('input:radio[name=Niv3_ej1]:checked').val(),$('input:radio[name=Niv3_ej2]:checked').val(),$('input:radio[name=Niv3_ej3]:checked').val())">Enviar
                    
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
                <h1 class="popup__title">Indicaciones</h1>Observa las siguientes figuras y responde las preguntas con
                ayuda del puntero.
            </p>
            <hr>
            <div class="text-center ">
                <img src='../rsc/img/nivel4/ejercicio1.png' alt=''
                    style=' margin-left: auto;margin-right: auto;display:inline-block;width:30%;'>
                = <input type="number" style="text-size:15px;width:50px;height:50px;" id="niv4_eje1">
            </div>
            <hr>
            <div class="text-center ">
                <img src='../rsc/img/nivel4/ejercicio2.png' alt=''
                    style=' margin-left: auto;margin-right: auto;display:inline-block;width:30%;'>
                = <input type="number" style="text-size:15px;width:50px;height:50px;" id="niv4_eje2">
            </div>
            <hr>
            <div class="text-center ">
                <img src='../rsc/img/nivel4/ejercicio3.png' alt=''
                    style=' margin-left: auto;margin-right: auto;display:inline-block;width:30%;'>
                = <input type="number" style="text-size:15px;width:50px;height:50px;" id="niv4_eje3">
            </div>
            <hr>
            <div class="text-center ">
                <img src='../rsc/img/nivel4/ejercicio4.png' alt=''
                    style=' margin-left: auto;margin-right: auto;display:inline-block;width:30%;'>
                = <input type="number" style="text-size:15px;width:50px;height:50px;" id="niv4_eje4">
            </div>
            <hr>
            <div class="text-center ">
                <img src='../rsc/img/nivel4/ejercicio5.png' alt=''
                    style=' margin-left: auto;margin-right: auto;display:inline-block;width:30%;'>
                = <input type="number" style="text-size:15px;width:50px;height:50px;" id="niv4_eje5">
            </div>
            <hr>
            <div class="text-center ">
                <img src='../rsc/img/nivel4/ejercicio6.png' alt=''
                    style=' margin-left: auto;margin-right: auto;display:inline-block;width:30%;'>
                = <input type="number" style="text-size:15px;width:50px;height:50px;" id="niv4_eje6">
            </div>
            <hr>
            <div class="text-center ">
                <img src='../rsc/img/nivel4/ejercicio7.png' alt=''
                    style=' margin-left: auto;margin-right: auto;display:inline-block;width:30%;'>
                = <input type="number" style="text-size:15px;width:50px;height:50px;" id="niv4_eje7">
            </div>
            <hr>
            <div class="text-center ">
                <img src='../rsc/img/nivel4/ejercicio8.png' alt=''
                    style=' margin-left: auto;margin-right: auto;display:inline-block;width:30%;'>
                = <input type="number" style="text-size:15px;width:50px;height:50px;" id="niv4_eje8">
            </div>
            <hr>
            <div class="text-center ">
                <img src='../rsc/img/nivel4/ejercicio9.png' alt=''
                    style=' margin-left: auto;margin-right: auto;display:inline-block;width:30%;'>
                = <input type="number" style="text-size:15px;width:50px;height:50px;" id="niv4_eje9">
            </div>
            <hr>
            <div class="text-center" style="margin-top:25px;">
                <button class="bubbly-button"
                    onclick="calificarnivel4(4,$('#niv4_eje1').val(),$('#niv4_eje2').val(),$('#niv4_eje3').val(),$('#niv4_eje4').val(),$('#niv4_eje5').val(),$('#niv4_eje6').val(),$('#niv4_eje7').val(),$('#niv4_eje8').val(),$('#niv4_eje9').val())">Enviar
                    
                </button>
            </div>

            <a href="#" class="popup__close">close</a>
        </div>
    </div>
    <div id="ejercicio5" class="popup popup-article">
        <div class="popup__block">
            <div class="linkedin">
                <div class="linkedin__container">
                    <p class="linkedin__text">Nivel 5</p>
                </div>
            </div>
            <p>
                <h1 class="popup__title">Indicaciones</h1> Resuelve las siguientes ejercicios, coloca el numero
                correspondiente a la cantidad de objetos que se plante y resuelve el problema.
            </p>
            <hr>
            <div class="text-center ">
                <table>
                    <tr>
                        <td><img src='../rsc/img/nivel5/flores.png' alt=''
                                style=' margin-left: auto;margin-right: auto;display:inline-block;width:90%'></td>
                        <td> </td>
                        <td>= <input type="number" style="text-size:15px;width:50px;height:50px;" id="niv5_res1"></td>
                    </tr>
                    <tr>
                        <td><input type="number" style="text-size:15px;width:150px;height:50px;" id="niv5_ej1val1"> +
                            <input type="number" style="text-size:15px;width:150px;height:50px;" id="niv5_ej1val2"></td>
                        <td></td>
                        <td>= <input type="number" style="text-size:15px;width:50px;height:50px;" id="niv5_resej1"></td>
                    </tr>
                </table>

            </div>
            <hr>
            <div class="text-center ">

                <table>
                    <tr>
                        <td><img src='../rsc/img/nivel5/peras.png' alt=''
                                style=' margin-left: auto;margin-right: auto;display:inline-block;width:90%'></td>
                        <td> </td>
                        <td>= <input type="number" style="text-size:15px;width:50px;height:50px;" id="niv5_res2"></td>
                    </tr>
                    <tr>
                        <td><input type="number" style="text-size:15px;width:150px;height:50px;" id="niv5_ej2val1"> +
                            <input type="number" style="text-size:15px;width:150px;height:50px;" id="niv5_ej2val2"></td>
                        <td></td>
                        <td>= <input type="number" style="text-size:15px;width:50px;height:50px;" id="niv5_resej2"></td>
                    </tr>
                </table>
            </div>
            <hr>
            <div class="text-center ">

                <table>
                    <tr>
                        <td><img src='../rsc/img/nivel5/bananos.png' alt=''
                                style=' margin-left: auto;margin-right: auto;display:inline-block;width:90%'></td>
                        <td> </td>
                        <td>= <input type="number" style="text-size:15px;width:50px;height:50px;" id="niv5_res3"></td>
                    </tr>
                    <tr>
                        <td><input type="number" style="text-size:15px;width:150px;height:50px;" id="niv5_ej3val1"> +
                            <input type="number" style="text-size:15px;width:150px;height:50px;" id="niv5_ej3val2"></td>
                        <td></td>
                        <td>= <input type="number" style="text-size:15px;width:50px;height:50px;" id="niv5_resej3"></td>
                    </tr>
                </table>

            </div>
            <hr>

            <div class="text-center" style="margin-top:25px;">
                <button class="bubbly-button"
                    onclick="calificarnivel5(5,$('#niv5_res1').val(),$('#niv5_ej1val1').val(),$('#niv5_ej1val2').val(),$('#niv5_resej1').val(),$('#niv5_res2').val(),$('#niv5_ej2val1').val(),$('#niv5_ej2val2').val(),$('#niv5_resej2').val(),$('#niv5_res3').val(),$('#niv5_ej3val1').val(),$('#niv5_ej3val2').val(),$('#niv5_resej3').val())">
                    Enviar
                </button>
            </div>

            <a href="#" class="popup__close">close</a>
        </div>
    </div>
    <div id="ejercicio6" class="popup popup-article">
        <div class="popup__block">
            <div class="linkedin">
                <div class="linkedin__container">
                    <p class="linkedin__text">Nivel 6</p>
                </div>
            </div>
            <p>
                <h1 class="popup__title">Indicaciones</h1>Tiene 5 minutos para redirijase al siguiente <a
                    href="https://www.mundoprimaria.com/juegos-educativos/juegos-matematicas/suma-horizontal-2"
                    onclick="cronometro(true)" target="_blank">Enlace y juegar </a> antes de los 5 minutos tiene que
                regresar y darle click a "ENVIAR"
            </p>
            <hr>
            <div class="text-center ">

                <div class="timer-group">
                    <div class="timer hour">
                        <div class="hand"><span></span></div>
                        <div class="hand"><span></span></div>
                    </div>
                    <div class="timer minute">
                        <div class="hand"><span></span></div>
                        <div class="hand"><span></span></div>
                    </div>
                    <div class="timer second">
                        <div class="hand"><span></span></div>
                        <div class="hand"><span></span></div>
                    </div>
                    <div class="face">
                        <p id="lazy">00:00:00</p>
                    </div>
                </div>

            </div>

            <div class="text-center" style="margin-top:25px;">
                <button id="boton_nivel6" onclick="calificarnivel6(6)" disabled class="bubbly-button">
                    Enviar
                </button>
            </div>

            <a href="#" class="popup__close">close</a>
        </div>
    </div>
    <div id="ejercicio7" class="popup popup-article">
        <div class="popup__block">
            <div class="linkedin">
                <div class="linkedin__container">
                    <p class="linkedin__text">Nivel 7</p>
                </div>
            </div>
            <p>
                <h1 class="popup__title">Indicaciones</h1>Tiene 5 minutos para redirijase al siguiente <a
                    href="https://www.mundoprimaria.com/juegos-educativos/juegos-matematicas/resta-horizontal-2"
                    onclick="cronometro2(true)" target="_blank">Enlace y juegar </a> antes de los 5 minutos tiene que
                regresar y darle click a "ENVIAR"
            </p>
            <hr>
            <div class="text-center ">

                <div class="timer-group">
                    <div class="timer hour">
                        <div class="hand"><span></span></div>
                        <div class="hand"><span></span></div>
                    </div>
                    <div class="timer minute">
                        <div class="hand"><span></span></div>
                        <div class="hand"><span></span></div>
                    </div>
                    <div class="timer second">
                        <div class="hand"><span></span></div>
                        <div class="hand"><span></span></div>
                    </div>
                    <div class="face">
                        <p id="lazy2">00:00:00</p>
                    </div>
                </div>

            </div>

            <div class="text-center" style="margin-top:25px;">
                <button id="boton_nivel7" onclick="calificarnivel7(1)" disabled class="bubbly-button">
                    Enviar
                </button>
            </div>

            <a href="#" class="popup__close">close</a>
        </div>
    </div>
    <div id="ejercicio8" class="popup popup-article">
        <div class="popup__block">
            <div class="linkedin">
                <div class="linkedin__container">
                    <p class="linkedin__text">Nivel 8</p>
                </div>
            </div>

            <p>
                <h1 class="popup__title">Indicaciones</h1>Resuelve los siguientes ejercicios, coloque las cantidades y
                signos correspondientes y resuelva las operaciones que se le piden.
            </p>
            <hr>
            <div class="text-center ">
                <p>
                    Si tengo 9 peras y una amiga de mama me regala 6. ¿Cuántas peras tengo en total?
                </p>
            </div>
            <br>
            <div class="text-center">
                <span class="input_text">
                    <input type="number" placeholder="" id="niv8_ej1_val1">
                    <span></span>
                </span>
                <span class="input_text"
                    style="width:100px;  box-shadow: inset 0 0 0 1px #fff, 0 0 0 4px #fff, 1px -1px 20px #1beabd,  -1px 1px 20px #ff104c; text-align:center">
                    <select>
                        <option value="" id="niv8_ej1_val2">Simbolo</option>
                        <option value="1">+</option>
                        <option value="2">-</option>
                        <option value="3">=</option>
                    </select>
                </span>
                <span class="input_text">
                    <input type="number" placeholder="" id="niv8_ej1_val3">
                    <span></span>
                </span>
                <span>=</span>
                <span class="input_text">
                    <input type="number" placeholder="" id="niv8_ej1_res1">
                    <span></span>
                </span>
            </div>

            <hr>
            <div class="text-center">
                <p>
                    Ernesto compro 10 relojes en una tienda de San Salvador, deicidio darle 3 a su hermano menor Luis.
                    ¿Cuántos relojes le quedaron a Ernesto?
                </p>
                <div class="text-center">
                    <span class="input_text">
                        <input type="number" placeholder="" id="niv8_ej2_val1">
                        <span></span>
                    </span>
                    <span class="input_text"
                        style="width:100px;  box-shadow: inset 0 0 0 1px #fff, 0 0 0 4px #fff, 1px -1px 20px #1beabd,  -1px 1px 20px #ff104c; text-align:center">
                        <select>
                            <option value="" id="niv8_ej2_val2">Simbolo</option>
                            <option value="1">+</option>
                            <option value="2">-</option>
                            <option value="3">=</option>
                        </select>
                    </span>
                    <span class="input_text">
                        <input type="number" placeholder="" id="niv8_ej2_val3">
                        <span></span>
                    </span>
                    <span>=</span>
                    <span class="input_text">
                        <input type="number" placeholder="" id="niv8_ej2_res2">
                        <span></span>
                    </span>
                </div>
                <hr>
                <div class="text-center">
                    <p>
                        Marcos tiene una granja, los animales están separados, según su especie, en corrales distintos.
                        En el primer corral Marcos tiene 8 vacas, en el segundo corral tiene 3 cerdos y en tercer corral
                        tiene 5 gallinas.
                        ¿Cuántos animales hay en la granja de Marcos?

                    </p>
                    <div class="text-center">
                        <span class="input_text">
                            <input type="number" placeholder="" id="niv8_ej3_val1">
                            <span></span>
                        </span>
                        <span class="input_text"
                            style="width:100px;  box-shadow: inset 0 0 0 1px #fff, 0 0 0 4px #fff, 1px -1px 20px #1beabd,  -1px 1px 20px #ff104c; text-align:center">
                            <select>
                                <option value="" id="niv8_ej3_val2">Simbolo</option>
                                <option value="1">+</option>
                                <option value="2">-</option>
                                <option value="3">=</option>
                            </select>
                        </span>
                        <span class="input_text">
                            <input type="number" placeholder="" id="niv8_ej3_val3">
                        </span>
                        <span class="input_text"
                            style="width:100px;  box-shadow: inset 0 0 0 1px #fff, 0 0 0 4px #fff, 1px -1px 20px #1beabd,  -1px 1px 20px #ff104c; text-align:center">

                            <select>
                                <option value="" id="niv8_ej3_val4">Simbolo</option>
                                <option value="1">+</option>
                                <option value="2">-</option>
                                <option value="3">=</option>
                            </select>
                        </span>

                        <span class="input_text">
                            <input type="number" placeholder="" id="niv8_ej3_val5">
                            <span></span>
                        </span>
                        <span>=</span>
                        <span class="input_text">
                            <input type="number" placeholder="" id="niv8_ej3_res3">
                            <span></span>
                        </span>
                    </div>
                </div>
                <hr>
                <div class="text-center">
                    <p>
                        Susana ha comprado 16 guineos, de camino a su casa se encontró a María y le regalo 7 de ellos
                        ¿Cuántos guineos le habrán quedado a Susana?
                    </p>
                    <div class="text-center">
                        <span class="input_text">
                            <input type="number" placeholder="" id="">
                            <span></span>
                        </span>
                        <span class="input_text"
                            style="width:100px;  box-shadow: inset 0 0 0 1px #fff, 0 0 0 4px #fff, 1px -1px 20px #1beabd,  -1px 1px 20px #ff104c; text-align:center">
                            <select>
                                <option value="" id="">Simbolo</option>
                                <option value="1">+</option>
                                <option value="2">-</option>
                                <option value="3">=</option>
                            </select>
                        </span>
                        <span class="input_text">
                            <input type="number" placeholder="" id="">
                        </span>

                        <span>=</span>
                        <span class="input_text">
                            <input type="number" placeholder="" id="niv8_ej4_res4">
                            <span></span>
                        </span>
                    </div>
                </div>
                <div class="text-center" style="margin-top:25px;">
                    <button id="boton_nivel1" class="bubbly-button"
                        onclick="calificarnivel8(8,$('#niv8_ej1_val1').val(),$('input:radio[name=niv8_ej1_val2]:checked').val(),$('#niv8_ej1_val3').val(),$('#niv8_ej1_res1').val(),$('#niv8_ej2_val1').val(),$('input:radio[name=niv8_ej2_val2]:checked').val(),$('#niv8_ej2_val3').val(),$('#niv8_ej2_res2').val(),$('#niv8_ej3_val1').val(),$('input:radio[name=niv8_ej3_val2]:checked').val(),$('#niv8_ej3_val3').val(),$('input:radio[name=niv8_ej3_val4]:checked').val(),$('#niv8_ej3_val5').val(),$('#niv8_ej3_res3').val(),$('#niv8_ej4_res4').val())">Enviar

                    </button>
                </div>
            </div>
            <a href="#" class="popup__close">close</a>
        </div>
    </div>
    <div id="ejercicio9" class="popup popup-article">
        <div class="popup__block">
            <div class="linkedin">
                <div class="linkedin__container">
                    <p class="linkedin__text">Nivel 9</p>
                </div>
            </div>

            <p>
                <h1 class="popup__title">Indicaciones</h1>Resuelve los siguientes ejercicios, coloque las cantidades y
                signos correspondientes y resuelva las operaciones que se le piden.
            </p>
            <hr>
            <div class="text-center ">
                <p>
                Josué tenía 27 jocotes que había comprado en el mercado, al llegar a su casa decide compartirlos con su hermanita Marielos, dándole 13 jocotes en una bolsita. ¿Cuántos jocotes le quedaron a Josué?
                </p>  
            </div>
            <br>
            <div class="text-center">
                <span class="input_text">
                    <input type="number" placeholder="" id="">
                    <span></span>
                </span>
                <span class="input_text"
                    style="width:100px;  box-shadow: inset 0 0 0 1px #fff, 0 0 0 4px #fff, 1px -1px 20px #1beabd,  -1px 1px 20px #ff104c; text-align:center">
                    <select>
                        <option value="" id="niv8_ej1_val2">Simbolo</option>
                        <option value="1">+</option>
                        <option value="2">-</option>
                        <option value="3">=</option>
                    </select>
                </span>
                <span class="input_text">
                    <input type="number" placeholder="" id="">
                    <span></span>
                </span>
                <span>=</span>
                <span class="input_text">
                    <input type="number" placeholder="" id="niv9_ej1_res">
                    <span></span>
                </span>
            </div>

            <hr>
            <div class="text-center">
                <p>
                En el albergue de perros se encuentran 14 perritos y 11 perritas. Don Juan quien es el encargado del albergue, quiere saber cuantos animales hay en total ¿Podrías ayudarlo?
                </p>
                <div class="text-center">
                    <span class="input_text">
                        <input type="number" placeholder="" id="">
                        <span></span>
                    </span>
                    <span class="input_text"
                        style="width:100px;  box-shadow: inset 0 0 0 1px #fff, 0 0 0 4px #fff, 1px -1px 20px #1beabd,  -1px 1px 20px #ff104c; text-align:center">
                        <select>
                            <option value="" id="">Simbolo</option>
                            <option value="1">+</option>
                            <option value="2">-</option>
                            <option value="3">=</option>
                        </select>
                    </span>
                    <span class="input_text">
                        <input type="number" placeholder="" id="">
                        <span></span>
                    </span>
                    <span>=</span>
                    <span class="input_text">
                        <input type="number" placeholder="" id="niv9_ej2_res">
                        <span></span>
                    </span>
                </div>
                <hr>
                <div class="text-center">
                    <p>
                    Katy ha comprado 40 pelotas para regalar a sus alumnos, si de camino a la escuela se le pincharon 23 ¿Cuántas pelotas le habrán quedado?

                    </p>
                    <div class="text-center">
                        <span class="input_text">
                            <input type="number" placeholder="" id="">
                            <span></span>
                        </span>
                        <span class="input_text"
                            style="width:100px;  box-shadow: inset 0 0 0 1px #fff, 0 0 0 4px #fff, 1px -1px 20px #1beabd,  -1px 1px 20px #ff104c; text-align:center">
                            <select>
                                <option value="" id="">Simbolo</option>
                                <option value="1">+</option>
                                <option value="2">-</option>
                                <option value="3">=</option>
                            </select>
                        </span>
                        <span class="input_text">
                            <input type="number" placeholder="" id="">
                        </span>
                        
                        <span>=</span>
                        <span class="input_text">
                            <input type="number" placeholder="" id="niv9_ej3_res">
                            <span></span>
                        </span>
                    </div>
                </div>
                <hr>
                <div class="text-center">
                    <p>
                    Jessica ha comprado 12 manzanas y Pedro tiene 6 en casa, si deciden juntarlas para hacer unos pasteles con ellas ¿Cuántas manzanas tendrán en total?
                    </p>
                    <div class="text-center">
                        <span class="input_text">
                            <input type="number" placeholder="" id="">
                            <span></span>
                        </span>
                        <span class="input_text"
                            style="width:100px;  box-shadow: inset 0 0 0 1px #fff, 0 0 0 4px #fff, 1px -1px 20px #1beabd,  -1px 1px 20px #ff104c; text-align:center">
                            <select>
                                <option value="" id="">Simbolo</option>
                                <option value="1">+</option>
                                <option value="2">-</option>
                                <option value="3">=</option>
                            </select>
                        </span>
                        <span class="input_text">
                            <input type="number" placeholder="" id="">
                        </span>

                        <span>=</span>
                        <span class="input_text">
                            <input type="number" placeholder="" id="niv9_ej4_res">
                            <span></span>
                        </span>
                    </div>
                </div>
                <div class="text-center" style="margin-top:25px;">
                    <button id="boton_nivel1" class="bubbly-button"
                        onclick="calificarnivel9(9,$('#niv9_ej1_res').val(),$('#niv9_ej2_res').val(),$('#niv9_ej3_res').val(),$('#niv9_ej4_res').val())">Enviar

                    </button>
                </div>
            </div>
            <a href="#" class="popup__close">close</a>
        </div>
    </div>
    <div id="ejercicio10" class="popup popup-article">
        <div class="popup__block">
            <div class="linkedin">
                <div class="linkedin__container">
                    <p class="linkedin__text">Nivel 10</p>
                </div>
            </div>
        <div class="text-center">
            <p >
                <h1 class="popup__title">Indicaciones</h1>Lorena, Antonio, Santiago y Cecilia desean comprar algunas cosas en la tienda de regalos.
                <img src='../rsc/img/nivel10/indicaciones.jpg' alt=''
                    style=' margin-left: auto;margin-right: auto;display:inline-block;width:50%;'>
            </p>
            </div>
            <hr>
            <div class="text-center ">
                <p>
                Si Lorena luego de un rato ha decidido llevarse un tambor y una blusa de doctora juguete, ¿Cuánto deberá pagar en la caja?
                </p>  
            </div>
            <br>
            <div class="text-center">
                <span class="input_text">
                    <input type="number" placeholder="" id="">
                    <span></span>
                </span>
                <span class="input_text"
                    style="width:100px;  box-shadow: inset 0 0 0 1px #fff, 0 0 0 4px #fff, 1px -1px 20px #1beabd,  -1px 1px 20px #ff104c; text-align:center">
                    <select>
                        <option value="" id="">Simbolo</option>
                        <option value="1">+</option>
                        <option value="2">-</option>
                        <option value="3">=</option>
                    </select>
                </span>
                <span class="input_text">
                    <input type="number" placeholder="" id="">
                    <span></span>
                </span>
                <span class="input_text"
                    style="width:100px;  box-shadow: inset 0 0 0 1px #fff, 0 0 0 4px #fff, 1px -1px 20px #1beabd,  -1px 1px 20px #ff104c; text-align:center">
                    <select>
                        <option value="" id="">Simbolo</option>
                        <option value="1">+</option>
                        <option value="2">-</option>
                        <option value="3">=</option>
                    </select>
                </span>
                <span class="input_text">
                    <input type="number" placeholder="" id="niv10_ej1_res">
                    <span></span>
                </span>
            </div>

            <hr>
            <div class="text-center">
                <p>
                Antonio comprara un carrito y una pelota ¿Cuánto debe de pagar en la caja?                </p>
                <div class="text-center">
                    <span class="input_text">
                        <input type="number" placeholder="" id="">
                        <span></span>
                    </span>
                    <span class="input_text"
                        style="width:100px;  box-shadow: inset 0 0 0 1px #fff, 0 0 0 4px #fff, 1px -1px 20px #1beabd,  -1px 1px 20px #ff104c; text-align:center">
                        <select>
                            <option value="" id="">Simbolo</option>
                            <option value="1">+</option>
                            <option value="2">-</option>
                            <option value="3">=</option>
                        </select>
                    </span>
                    <span class="input_text">
                        <input type="number" placeholder="" id="">
                        <span></span>
                    </span>
                    <span class="input_text"
                    style="width:100px;  box-shadow: inset 0 0 0 1px #fff, 0 0 0 4px #fff, 1px -1px 20px #1beabd,  -1px 1px 20px #ff104c; text-align:center">
                    <select>
                        <option value="" id="">Simbolo</option>
                        <option value="1">+</option>
                        <option value="2">-</option>
                        <option value="3">=</option>
                    </select>
                </span>
                    <span class="input_text">
                        <input type="number" placeholder="" id="niv10_ej2_res">
                        <span></span>
                    </span>
                </div>
                <hr>
                <div class="text-center">
                    <p>
                    Santiago ha decidido llevar un tambor y un carrito ¿Cuánto pagara Santiago?
                    </p>
                    <div class="text-center">
                        <span class="input_text">
                            <input type="number" placeholder="" id="">
                            <span></span>
                        </span>
                        <span class="input_text"
                            style="width:100px;  box-shadow: inset 0 0 0 1px #fff, 0 0 0 4px #fff, 1px -1px 20px #1beabd,  -1px 1px 20px #ff104c; text-align:center">
                            <select>
                                <option value="" id="">Simbolo</option>
                                <option value="1">+</option>
                                <option value="2">-</option>
                                <option value="3">=</option>
                            </select>
                        </span>
                        <span class="input_text">
                            <input type="number" placeholder="" id="">
                        </span>
                        <span class="input_text"
                    style="width:100px;  box-shadow: inset 0 0 0 1px #fff, 0 0 0 4px #fff, 1px -1px 20px #1beabd,  -1px 1px 20px #ff104c; text-align:center">
                    <select>
                        <option value="" id="">Simbolo</option>
                        <option value="1">+</option>
                        <option value="2">-</option>
                        <option value="3">=</option>
                    </select>
                </span>
                        <span class="input_text">
                            <input type="number" placeholder="" id="niv10_ej3_res">
                            <span></span>
                        </span>
                    </div>
                </div>
                <hr>
                <div class="text-center">
                    <p>
                    Cecilia ha decidido llevar una blusa de doctora juguete, pero su mamá le dio un vale de descuento de $17 ¿Cuánto pagara Cecilia por su blusa?                    
                  </p>
                    <div class="text-center">
                        <span class="input_text">
                            <input type="number" placeholder="" id="">
                            <span></span>
                        </span>
                        <span class="input_text"
                            style="width:100px;  box-shadow: inset 0 0 0 1px #fff, 0 0 0 4px #fff, 1px -1px 20px #1beabd,  -1px 1px 20px #ff104c; text-align:center">
                            <select>
                                <option value="" id="">Simbolo</option>
                                <option value="1">+</option>
                                <option value="2">-</option>
                                <option value="3">=</option>
                            </select>
                        </span>
                        <span class="input_text">
                            <input type="number" placeholder="" id="">
                        </span>
                        <span class="input_text"
                    style="width:100px;  box-shadow: inset 0 0 0 1px #fff, 0 0 0 4px #fff, 1px -1px 20px #1beabd,  -1px 1px 20px #ff104c; text-align:center">
                    <select>
                        <option value="" id="">Simbolo</option>
                        <option value="1">+</option>
                        <option value="2">-</option>
                        <option value="3">=</option>
                    </select>
                </span>
                        <span class="input_text">
                            <input type="number" placeholder="" id="niv10_ej4_res">
                            <span></span>
                        </span>
                    </div>
                </div>
                <div class="text-center" style="margin-top:25px;">
                    <button id="boton_nivel1" class="bubbly-button"
                        onclick="calificarnivel10(10,$('#niv10_ej1_res').val(),$('#niv10_ej2_res').val(),$('#niv10_ej3_res').val(),$('#niv10_ej4_res').val())">Enviar
                    </button>
                </div>
            </div>
            <a href="#" class="popup__close">close</a>
        </div>
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
    echo $trofeo
    ?>

<style>

.bubbly-button {
  font-family: 'Helvetica', 'Arial', sans-serif;
  display: inline-block;
  font-size: 1em;
  padding: 1em 2em;
  margin-top: 100px;
  margin-bottom: 60px;
  -webkit-appearance: none;
  appearance: none;
  background-color: blue;
  color: #fff;
  border-radius: 4px;
  border: none;
  cursor: pointer;
  position: relative;
  transition: transform ease-in 0.1s, box-shadow ease-in 0.25s;
  box-shadow: 0 2px 25px rgba(255, 0, 130, 0.5);
}
.bubbly-button:focus {
  outline: 0;
}
.bubbly-button:before, .bubbly-button:after {
  position: absolute;
  content: '';
  display: block;
  width: 140%;
  height: 100%;
  left: -20%;
  z-index: -1000;
  transition: all ease-in-out 0.5s;
  background-repeat: no-repeat;
}
.bubbly-button:before {
  display: none;
  top: -75%;
  background-image: radial-gradient(circle, blue 20%, transparent 20%), radial-gradient(circle, transparent 20%, blue 20%, transparent 30%), radial-gradient(circle, blue 20%, transparent 20%), radial-gradient(circle, blue 20%, transparent 20%), radial-gradient(circle, transparent 10%, blue 15%, transparent 20%), radial-gradient(circle, blue 20%, transparent 20%), radial-gradient(circle, blue 20%, transparent 20%), radial-gradient(circle, blue 20%, transparent 20%), radial-gradient(circle, blue 20%, transparent 20%);
  background-size: 10% 10%, 20% 20%, 15% 15%, 20% 20%, 18% 18%, 10% 10%, 15% 15%, 10% 10%, 18% 18%;
}
.bubbly-button:after {
  display: none;
  bottom: -75%;
  background-image: radial-gradient(circle, blue 20%, transparent 20%), radial-gradient(circle, blue 20%, transparent 20%), radial-gradient(circle, transparent 10%, blue 15%, transparent 20%), radial-gradient(circle, blue 20%, transparent 20%), radial-gradient(circle, blue 20%, transparent 20%), radial-gradient(circle, blue 20%, transparent 20%), radial-gradient(circle, blue 20%, transparent 20%);
  background-size: 15% 15%, 20% 20%, 18% 18%, 20% 20%, 15% 15%, 10% 10%, 20% 20%;
}
.bubbly-button:active {
  transform: scale(0.9);
  background-color: #0000e6;
  box-shadow: 0 2px 25px rgba(255, 0, 130, 0.2);
}
.bubbly-button.animate:before {
  display: block;
  animation: topBubbles ease-in-out 0.75s forwards;
}
.bubbly-button.animate:after {
  display: block;
  animation: bottomBubbles ease-in-out 0.75s forwards;
}

@keyframes topBubbles {
  0% {
    background-position: 5% 90%, 10% 90%, 10% 90%, 15% 90%, 25% 90%, 25% 90%, 40% 90%, 55% 90%, 70% 90%;
  }
  50% {
    background-position: 0% 80%, 0% 20%, 10% 40%, 20% 0%, 30% 30%, 22% 50%, 50% 50%, 65% 20%, 90% 30%;
  }
  100% {
    background-position: 0% 70%, 0% 10%, 10% 30%, 20% -10%, 30% 20%, 22% 40%, 50% 40%, 65% 10%, 90% 20%;
    background-size: 0% 0%, 0% 0%,  0% 0%,  0% 0%,  0% 0%,  0% 0%;
  }
}
@keyframes bottomBubbles {
  0% {
    background-position: 10% -10%, 30% 10%, 55% -10%, 70% -10%, 85% -10%, 70% -10%, 70% 0%;
  }
  50% {
    background-position: 0% 80%, 20% 80%, 45% 60%, 60% 100%, 75% 70%, 95% 60%, 105% 0%;
  }
  100% {
    background-position: 0% 90%, 20% 90%, 45% 70%, 60% 110%, 75% 80%, 95% 70%, 110% 10%;
    background-size: 0% 0%, 0% 0%,  0% 0%,  0% 0%,  0% 0%,  0% 0%;
  }
}
</style>
    <script>
var animateButton = function(e) {

e.preventDefault;
//reset animation
e.target.classList.remove('animate');

e.target.classList.add('animate');
setTimeout(function(){
  e.target.classList.remove('animate');
},700);
};

var bubblyButtons = document.getElementsByClassName("bubbly-button");

for (var i = 0; i < bubblyButtons.length; i++) {
bubblyButtons[i].addEventListener('click', animateButton, false);
}
    </script>
</body>