<!DOCTYPE html>
<html class="menu">
<html>

<head>

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content=="IE=edge" />
    <meta name="google" value="notranslate" />
    <title>Side Menu</title>
    <?php 
  
    include_once("../rutas.php"); 
    include_once(USER_SESSION);
    $userSession = new UserSession();   
    include("assets/menu_lateral.php");
    ?>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../rsc/css/Bootstrap.min.css" />
    <link href="../rsc/css/all.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../rsc/css/tema_principal.css">
    <link rel="stylesheet" type="text/css" href="../rsc/css/style.css">
    <link rel="stylesheet" type="text/css" href="../rsc/fontawesome/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">

</head>

<body>
    
    
    <div class="cuerpo">
        <div class="flexing">
            <div class="section section--yellow" onclick="location.href='ejercicio1.php'">
                <h3 class="title text-center">Ejercicio 1</h3>
            </div>
            <div class="section section--pink" onclick="location.href='ejercicio2.php'">
                <h3 class="title text-center">Ejercicio 2</h3>
            </div>
            <div class="section section--green" onclick="location.href='ejercicio33.php'">
                <h3 class="title text-center">Ejercicio 3</h3>
            </div>
            <div class="section section--blue" onclick="location.href='ejercicio33.php'">
                <h3 class="title text-center">Ejercicio 4</h3>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../rsc/js/jquery-3.4.1.js"></script>
    <script src="../rsc/js/popper.min.js"></script>
    <script src="../rsc/js/bootstrap.min.js"></script>
</body>

</html>