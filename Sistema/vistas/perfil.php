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
    <link rel="stylesheet" type="text/css"
        href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
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

  $userSession = new UserSession();   
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
            <div class="col-xs-1-12 ml-5" style="" >
                <div class="card " style="background:white">
                    <div class="card-body">
                        <div class="" style="padding-top:5%;padding-left:50px;width:250px">
                            <div class="tools_expert">
                                <div class="skill_main">
                                    <div class="skill_item">
                                        <h4>Ejercicio 1 <span class="counter">85%</span>%</h4>
                                        <div class="progress_br">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="85"
                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="skill_item">
                                        <h4>Ejercicio 2 <span class="counter">90</span>%</h4>
                                        <div class="progress_br">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="90"
                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="skill_item">
                                        <h4>Ejercicio 3 <span class="counter">70</span>%</h4>
                                        <div class="progress_br">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="70"
                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="skill_item">
                                        <h4>Ejercicio 4 <span class="counter">95</span>%</h4>
                                        <div class="progress_br">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="95"
                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="skill_item">
                                        <h4>Ejercicio 5 <span class="counter">75</span>%</h4>
                                        <div class="progress_br">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="75"
                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-1-12 ml-5" style="width:25%;" >
                <div class="card " style="background:white">
                    <div class="card-body">
                        <div class="" style="padding-top:5%;padding-left:50px;width:250px">
                            <div class="tools_expert">
                                <div class="skill_main">
                                <div class="skill_item">
                                        <h4>Ejercicio 6 <span class="counter">75</span>%</h4>
                                        <div class="progress_br">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="75"
                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="skill_item">
                                        <h4>Ejercicio 7 <span class="counter">75</span>%</h4>
                                        <div class="progress_br">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="75"
                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="skill_item">
                                        <h4>Ejercicio 8 <span class="counter">75</span>%</h4>
                                        <div class="progress_br">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="75"
                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="skill_item">
                                        <h4>Ejercicio 9 <span class="counter">75</span>%</h4>
                                        <div class="progress_br">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="75"
                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="skill_item">
                                        <h4>Ejercicio 10 <span class="counter">75</span>%</h4>
                                        <div class="progress_br">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="75"
                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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

</body>

</html>