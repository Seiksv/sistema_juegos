<?php
  include_once("../../rutas.php"); 


    if ($_SERVER['REQUEST_METHOD']=="POST") {
        switch ($_POST['nivel']) {
            case '2':
                $puntaje = $_POST['puntaje'];
                $nivel = $_POST['nivel'];
                $usuario =$_POST['usuario'];
                
                return $usuario;
                break;
            
            default:
                return "Error, no se envio el nivel correcto";
                break;
        }
    }
    else
    return "Metodo POST, no detectado.";
?>