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
        $query = $this->connect()->prepare('SELECT juego_x_usuario.*, juego.* FROM juego_x_usuario INNER JOIN juego on juego_x_usuario.id_juego = juego.idJuego WHERE juego_x_usuario.id_usuario = (Select id_usuario from usuario where usuario = :iduser)');
        $query->execute(['iduser' => $user]);
        return $res = $query->fetchAll();
    }

    public function insertar($user,$nivel,$intentos,$fallos,$aciertos,$finalizado){
        $query = $this->connect()->prepare("INSERT INTO `juego_x_usuario` (`id`, `id_usuario`, `id_juego`, `intentos`, `fallos`, `aciertos`, `finalizado`) VALUES (NULL, (SELECT id_usuario from usuario where usuario = :usuario), :nivel, :intentos,  :fallos, :aciertos, :finalizado)");
        $query->execute(['usuario' => $user, 'nivel' => $nivel, 'intentos'=> $intentos, 'fallos'=> $fallos, 'aciertos' => $aciertos, 'finalizado'=>$finalizado]);
        return $res = $query->fetchAll();
    }

    
}

?>