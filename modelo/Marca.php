<?php

class Marca {
    // Atributos
    public $nombre;

    // Constructor
    public function __construct($nombre){
        $this->nombre = $nombre;
    }

    // Métodos
    public function muestra(){
        return "Nombre de la marca: " . $this->nombre;
    }
}