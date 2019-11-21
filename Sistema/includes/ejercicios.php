<?php
class ejercicios{

    /********************  Nivel 2 ************************/

    //Ejercicio 1
    public function nivel2_ejercicio1(){
        $imagenes= array(2,5,6,7,9,10);
        $cant_imagenes=count($imagenes);
        $numero_imagenes = rand(0,($cant_imagenes-1));
        return $imagenes[$numero_imagenes];
    }

}

?>
