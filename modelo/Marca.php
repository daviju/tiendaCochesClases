<?php

class Marca {
    // Atributos
    public $marca;
    public $modelo;

    // Constructor
    public function __construct($marca, $modelo){
        $this->marca = $marca;
        $this->modelo = $modelo;
    }

    // Métodos
    public function muestra(){
        return "Marca: " . $this->marca . ", Modelo: " . $this->modelo;
    }
}
