<?php

// include_once "RepoCrud.php";
$base = $_SERVER['DOCUMENT_ROOT'];
require_once "$base/Clases/Coche.php";

class RepoCoche {
    private $con;

    public function __construct($con){
        $this->con = $con;
    }

    public function findByID($id){
        $stm = $this->con->prepare("SELECT * FROM coche WHERE id = :id");
        $stm->execute(['id' =>$id]);
        
        $coche = null;
        $registro = $stm->fetch();

        if ($registro) {
            $coche = new Coche();

            $coche->id = $registro['id'];
            $coche->modelo = $registro['modelo'];
            $coche->marca = $registro['marca'];
        }
        return $coche;
    }
}