<?php
include_once 'includes/user.php';
include_once 'includes/user_session.php';


$userSession = new UserSession();
$user = new User();

if(isset($_SESSION['user'])){
    //echo "hay sesion";
    $user->setUser($userSession->getCurrentUser());
    header('Location: vistas/home.php');

}else if(isset($_POST['username']) && isset($_POST['password']) && $_POST['accion']=="iniciar"){
    
    $userForm = $_POST['username'];
    $passForm = $_POST['password'];

    $user = new User();
    if($user->userExists($userForm, $passForm)){
        //echo "Existe el usuario";
        $userSession->setCurrentUser($userForm);
        $user->setUser($userForm);

        header('Location: vistas/home.php');
    }else{
        //echo "No existe el usuario";
        $errorLogin = "Nombre de usuario y/o password incorrecto";
        include_once 'vistas/login_test.php';
    }
}
else if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['nombre']) && $_POST['accion']=="registrar"){
    $userForm = $_POST['username'];
    $passForm = $_POST['password'];
    $nombreForm = $_POST['nombre'];
    $user = new User();
    if($user->createUser($userForm, $passForm,$nombreForm)){
        $i=0;
        while ($i<=10) {
            $i++;
            if ($i==1) {
                $user->createLevels($userForm,$i,"si");
            }
            else if($i<=10){
                $user->createLevels($userForm,$i,"no");
            }
        }
        include_once 'vistas/login_test.php';
    }
    else{
        $errorLogin="Usuario ya existe";
    }
}else{
    //echo "Algo va mal";
    include_once 'vistas/login_test.php';
}



?>