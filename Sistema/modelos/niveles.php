<?php
include '../includes/db.php';

class Niveles extends DB{
    private $nombre;
    private $username;

    public function getNiveles(){

     if ($this->connect()) 
 {

      $sql = "SELECT * FROM juego";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute(); 
     return $res = $stmt->fetchAll();
  } else {
      echo "Hubo un problema con la conexión";
  }
       
    }

    public function getNivelesUser($user){
        $query = $this->connect()->prepare('SELECT * FROM juego_x_usuario WHERE juego_x_usuario.id_usuario = (Select id_usuario from usuario where usuario = :iduser)');
        $query->execute(['iduser' => $user]);
        return $res = $query->fetchAll();
    }

    
}

?>