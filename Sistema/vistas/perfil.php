<!DOCTYPE html>
<html class="menu">
<html>

<head>

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content=="IE=edge" />
    <meta name="google" value="notranslate" />
    <title>Side Menu</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../rsc/css/Bootstrap.min.css" />
    <link href="../rsc/css/all.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../rsc/css/tema_principal.css">
    <link rel="stylesheet" type="text/css" href="../rsc/css/style.css">
    <link rel="stylesheet" type="text/css" href="../rsc/fontawesome/css/all.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
    <!-- main css -->
    <link rel="stylesheet" href="../rsc/css/style_profile.css">
    <link rel="stylesheet" href="../rsc/css/responsive_profile.css">
</head>

<body style="background-image: -webkit-linear-gradient(0deg, #766dff 0%, #88f3ff 100%);    height: 100vh;

">
    <?php 
  
  include_once("../rutas.php"); 
  include_once(USER_SESSION);
  include_once(BASE_DATOS);
  include_once(MODELOS . "niveles.php");

  $niveles = new Niveles();
  $userSession = new UserSession();
  $niveles_juego = $niveles->getNiveles($userSession->getCurrentUser());
  $trofeo=0;
   
  include("assets/menu_lateral.php");
  ?>
    <div class="cuerpo">
        <div class="row" style="position: absolute;
    top: 25%;
    left: 15%;
    width:100%">
            <div class="col-xs-1-12">
                <div class="card" style="background:white">
                    <div class="card-body">
                        <div class="">
                            <div class="personal_text">
                                <h6>Bienvenido de nuevo!</h6>
                                <h3><?= $userSession->getCurrentUser(); ?></h3>
                                <hr>
                                <p>Aca podras observar las puntuaciones que has obtenido en los ejercicios
                                    propuestos que estan en la plataforma!<p>
                                        <div style="padding:10%">
                                            <img src="../rsc/img/usericons.gif" alt="" style="border-radius:25%">

                                        </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <?php
            $html1=' <div class="col-xs-1-12 ml-5" style="" >
            <div class="card " style="background:white">
                <div class="card-body">
                    <div class="" style="padding-top:5%;padding-left:50px;width:250px">
                        <div class="tools_expert">
                            <div class="skill_main">';
                            
             $html2=' <div class="col-xs-1-12 ml-5" style="width:25%;" >
                            <div class="card " style="background:white">
                                <div class="card-body">
                                    <div class="" style="padding-top:5%;padding-left:50px;width:250px">
                                        <div class="tools_expert">
                                            <div class="skill_main">';

                                            $i=0;
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
                $barra_porcentaje = (((($niveles_juego[$i]['aciertos']) * 100) / $niveles_juego[$i]['ejercicios']) * 100) / 100;
                if($i<5){
                $html1.='
                                    <div class="skill_item">
                                        <h4>'.$niveles_juego[$i]['nombre'].' <span class="counter">'.round($barra_porcentaje,2).'% (Intentos: '.$niveles_juego[$i]['intentos'].')</span></h4>
                                        <div class="progress_br">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="'.$barra_porcentaje.'"
                                                    aria-valuemin="0" aria-valuemax="100">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                ';
                }
                else{
                    $html2.= '
                                        <div class="skill_item">
                                            <h4>'.$niveles_juego[$i]['nombre'].' <span class="counter">'.round($barra_porcentaje,2).'% (Intentos: '.round($niveles_juego[$i]['intentos'],2).')</span></h4>
                                            <div class="progress_br">
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="'.$barra_porcentaje.'"
                                                        aria-valuemin="0" aria-valuemax="100">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                    ';
                }
                $i++;
            }
            $html1.='
            </div>
        </div>
    </div>
</div>
</div>
</div>  ';$html2.='
</div>
</div>
</div>
</div>
</div>
</div>  ';
echo $html1;
echo $html2;
            ?>

        </div>

    </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="../rsc/js/jquery-3.4.1.js"></script>
    <script src="../rsc/js/popper.min.js"></script>
    <script src="../rsc/js/bootstrap.min.js"></script>
    <script src="../rsc/js/jquery.waypoints.min.js"></script>
    <script src="../rsc/js/jquery.counterup.min.js"></script>
    <script src="../rsc/js/thema_profile.js"></script>
    <script src="../rsc/js/sweetalert2.js"></script>
    <?= $trofeo?>

</body>

</html>