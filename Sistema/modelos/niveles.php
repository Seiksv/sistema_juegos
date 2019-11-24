<?php


class Niveles extends DB{
    private $nombre;
    private $username;

    public function getNiveles(){

     if ($this->connect()) 
 {

      $sql = "SELECT juego_x_usuario.*, juego.* FROM juego_x_usuario INNER JOIN juego on juego_x_usuario.id_juego = juego.idJuego";
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

 
    public function getJuego($juego){
        $query = $this->connect()->prepare("SELECT * FROM juego where idJuego = :juego");
        $query->execute(['juego' => $juego]);
        return $res = $query->fetchAll();
    }
    public function getAllJuegoxJugador($jugador,$nivel){
        $query = $this->connect()->prepare("SELECT *  FROM juego_x_usuario where juego_x_usuario.id_usuario = (Select id_usuario from usuario where usuario = :usuario) and id_juego = :nivel");
        $query->execute(['usuario' => $jugador, 'nivel' => $nivel]);
        return $res = $query->fetchAll();
    }

    public function actua_nivel($juego,$intentos,$fallos,$aciertos,$finalizado){
        $query = $this->connect()->prepare(" UPDATE `juego_x_usuario` SET `intentos` = $intentos, `fallos` = $fallos,`aciertos` = $aciertos, `finalizado`= '$finalizado' WHERE `juego_x_usuario`.`id` = $juego");
        $res = $query->execute();
        return $res;
    }
    public function insertar_nivel($user,$nivel,$intentos,$fallos,$aciertos,$finalizado){
        $query = $this->connect()->prepare("INSERT INTO `juego_x_usuario` (`id`, `id_usuario`, `id_juego`, `intentos`, `fallos`, `aciertos`, `finalizado`) VALUES (NULL, (SELECT id_usuario from usuario where usuario = '$user'), $nivel, $intentos,  $fallos, $aciertos, '$finalizado')");
        $res = $query->execute();
        return $res;
    }
    
}

?>