<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>InteracMath - Ayuda</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300i,400" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="../rsc/css/tema_principal.css">
    <link rel="stylesheet" type="text/css" href="../rsc/css/style.css">
    <link rel="stylesheet" type="text/css" href="../rsc/fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="../rsc/css/Bootstrap.min.css" />

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
  
<div class="card hijo">
    <img class="card-img-top" src="holder.js/100x180/" alt="">
    <div class="card-body" >
        <h2 class="card-title">InteracMath - Entregado por</h2>
        <hr>
        <h4 class="card-text">Gómez Martínez, Ana Ruth</h4>
        <h4 class="card-text">Gudiel Asencio, Susana Carolina </h4>
        <h4 class="card-text">Javier Vásquez, Carmen Beatriz </h4>
        <h4 class="card-text">Martínez Tejada, Stephannie Jeanmillette </h4>
        <h4 class="card-text">Ortiz García, Yenifer Elizabeth </h4>
        <br>
        <div style="bottom:0;position: absolute;width:80%;margin-bottom:25px;">
        <hr>
        <h2 class="card-text" >Todos los derechos reservados.</h2></div>
    </div>
</div>

</div>
<footer>
	<p>
		Created with <i class="fa fa-heart"></i> by
		<a target="_blank" href="https://github.com/Seiksv">Seiksv</a>
		- Read how I created this and how much time this took me.
		<a target="_blank" href="https://github.com/Seiksv/sistema_juegos.git">here</a>.
	</p>
</footer>
<style>
    
    .padre {
  background-color: #white;
  border: 1px solid #ccc;
  padding: 0 1rem;
  margin: 1rem;
}

.hijo {
  background-color: white;
  width:400px;
  /* IMPORTANTE */

  margin-left: auto;
  margin-right: auto;
}

    footer {
    background-color: #222;
    color: #fff;
    font-size: 14px;
    bottom: 0;
    position: fixed;
    left: 0;
    right: 0;
    text-align: center;
    z-index: 999;
}

footer p {
    margin: 1px 0;
}

footer i {
    color: red;
}

footer a {
    color: #3c97bf;
    text-decoration: none;
}
</style>
</body>
</html>