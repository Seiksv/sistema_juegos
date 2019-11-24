<?php
include 'db.php';

class User extends DB{
    private $nombre;
    private $username;


    public function userExists($user, $pass){
        $query = $this->connect()->prepare('SELECT * FROM usuario WHERE usuario = :user AND contra = :pass');
        $query->execute(['user' => $user, 'pass' => $pass]);

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    public function createUser($user, $pass, $nombre){
        $query = $this->connect()->prepare("INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellido`, `contra`, `TpoUsuario_id_tpo_usuario`, `Curso_idCurso`, `usuario`) VALUES (NULL, '$nombre', null, '$pass', 1, 1, '$user');
        ");
        $query->execute();

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }
    public function createLevels($user,$nivel,$permiso){
        $query = $this->connect()->prepare("INSERT INTO `juego_x_usuario` (`id`, `id_usuario`, `id_juego`, `intentos`, `fallos`, `aciertos`, `finalizado`, `acceso`) VALUES (NULL, (SELECT id_usuario FROM usuario WHERE usuario = '$user'), '$nivel', 0, 0, 0, 'no', '$permiso')");
        $query->execute();

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }
    public function setUser($user){
        $query = $this->connect()->prepare('SELECT * FROM usuario WHERE usuario = :user');
        $query->execute(['user' => $user]);
        
        foreach ($query as $currentUser) {
            $this->nombre = $currentUser['nombre'];
            $this->usename = $currentUser['usuario'];
        }
    }

    public function getNombre(){
        return $this->nombre;
    }
}

?>