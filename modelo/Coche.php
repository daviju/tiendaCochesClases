<?php

include_once "Marca.php";

class Coche extends Marca {
    // Atributos
    public $id;
    public $modelo;
    public $marca;

    // Constructores
    public function __construct($modelo, $marca){
        $this->marca = $marca;
        $this->modelo = $modelo;
    }

    // Métodos
    public function muestra(){ // Mostrar los coches
        return "Marca: " . $this->marca . " Modelo: " . $this->modelo;
    }

}