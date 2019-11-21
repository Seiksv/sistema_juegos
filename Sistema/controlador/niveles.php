<?php


/*************************************** */
/*****************Nivel 2 ****************/
/*************************************** */


// Ejercicio 1 
$numero_correcto = $ejercicio->nivel2_ejercicio1();
$ruta_imagen = "<img src='../rsc/img/nivel2/ej1/".$numero_correcto.".png' alt='' style=' margin-left: auto;
margin-right: auto;margin-bottom:15px;display:inline-block'>";
$a=0;
$i=0;
$numero_random=rand(0,4);
while ($a < 5) {
  //Obtengo el numero random desconocido
 $numero_desconocido = $ejercicio->nivel2_ejercicio1();

 //Si el numero desconocido es igual al correcto
  if ($numero_desconocido==$numero_correcto and $i==0) {
    $array_numeros_incorrectos[] = "<input type='radio' name='ejercicio1' value='$numero_correcto' class='option-input radio'>".$numero_correcto."</input>";
    $i=1;
  }
  else if($i==1){
    $numero_desconocido = $numero_desconocido+1;
    $array_numeros_incorrectos[] =  "<input type='radio' name='ejercicio1' value='$numero_desconocido' class='option-input radio'>".$numero_desconocido."</input>";
  }
  else{
    $array_numeros_incorrectos[] =  "<input type='radio' name='ejercicio1' value='$numero_desconocido' class='option-input radio'>".$numero_desconocido."</input>";
  }
  $a++;
}

$ej1respuesta = $numero_correcto;


//Ejercicio 2
$ej2numero_correcto = $ejercicio->nivel2_ejercicio1();
$ej2ruta_imagen = "<img src='../rsc/img/nivel2/ej1/".$ej2numero_correcto.".png' alt='' style=' margin-left: auto;
margin-right: auto;margin-bottom:15px;display:inline-block'>";
$a=0;
$i=0;
$ej2numero_random=rand(0,4);
$ej2respuesta = $ej2numero_correcto+ $ej1respuesta;
while ($a < 5) {
  //Obtengo el numero random desconocido
  $ej2numero_desconocido = $ejercicio->nivel2_ejercicio1();
  if($a == $ej2numero_random and $i==0 ){
    $ej2array_numeros_incorrectos[] = "<input type='radio' name='ejercicio2' value='$ej2respuesta' class='option-input radio'>".$ej2respuesta."</input>";
    $i=1;
  }
 //Si el numero desconocido es igual al correcto
  if ($ej2numero_desconocido==$ej2respuesta and $i==0) {
    $ej2array_numeros_incorrectos[] = "<input type='radio' name='ejercicio2' value='$ej2respuesta' class='option-input radio'>".$ej2respuesta."</input>";
    $i=1;
  }
  else if($i==1){
    $ej2numero_desconocido = $ej2numero_desconocido+1;
    $ej2array_numeros_incorrectos[] =  "<input type='radio' name='ejercicio2' value='$ej2numero_desconocido' class='option-input radio'>".$ej2numero_desconocido."</input>";
  }
  else{
    $ej2array_numeros_incorrectos[] =  "<input type='radio' name='ejercicio2' value='$ej2numero_desconocido' class='option-input radio'>".$ej2numero_desconocido."</input>";
  }
  $a++;
}



//Ejercicio 3
$ej3numero_correcto = $ejercicio->nivel2_ejercicio1();
$ej3ruta_imagen = "<img src='../rsc/img/nivel2/ej1/".$ej3numero_correcto.".png' alt='' style=' margin-left: auto;
margin-right: auto;margin-bottom:15px;display:inline-block'>";
$a=0;
$i=0;
$ej3numero_random=rand(0,4);
$ej3respuesta = $ej2respuesta + $ej3numero_correcto;
while ($a < 5) {
  //Obtengo el numero random desconocido
  $ej3numero_desconocido = $ejercicio->nivel2_ejercicio1();
  if($a == $ej3numero_random and $i==0 ){
    $ej3array_numeros_incorrectos[] = "<input type='radio' name='ejercicio2' value='$ej3respuesta' class='option-input radio'>".$ej3respuesta."</input>";
    $i=1;
  }
 //Si el numero desconocido es igual al correcto
  if ($ej3numero_desconocido==$ej3respuesta and $i==0) {
    $ej3array_numeros_incorrectos[] = "<input type='radio' name='ejercicio3' value='$ej3respuesta' class='option-input radio'>".$ej3respuesta."</input>";
    $i=1;
  }
  else if($i==1){
    $ej3numero_desconocido = $ej3numero_desconocido+5;
    $ej3array_numeros_incorrectos[] =  "<input type='radio' name='ejercicio3' value='$ej3numero_desconocido' class='option-input radio'>".$ej3numero_desconocido."</input>";
  }
  else{
    $ej3array_numeros_incorrectos[] =  "<input type='radio' name='ejercicio3' value='$ej3numero_desconocido' class='option-input radio'>".$ej3numero_desconocido."</input>";
  }
  $a++;
}


?>