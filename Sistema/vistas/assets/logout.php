<?php
    include_once("../../rutas.php"); 
    include_once(USER_SESSION);

    $userSession = new UserSession();
    $userSession->closeSession();

    header("location: ../../index.php");

?>