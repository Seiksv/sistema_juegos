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
    <link rel="stylesheet" type="text/css" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
</head>

<body>
<?php 
  
  include_once("../rutas.php"); 
  include_once(USER_SESSION);
  include_once(BASE_DATOS);

  $userSession = new UserSession();   
  include("assets/menu_lateral.php");
  ?>
    <div class="cuerpo">

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../rsc/js/jquery-3.4.1.js"></script>
    <script src="../rsc/js/popper.min.js"></script>
    <script src="../rsc/js/bootstrap.min.js"></script>
</body>

</html>