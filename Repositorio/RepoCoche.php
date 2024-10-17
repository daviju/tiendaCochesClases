<?php

// include_once "RepoCrud.php";
$base = $_SERVER['DOCUMENT_ROOT'];
require_once "$base/Clases/Coche.php";

class RepoCoche {
    private $con;

    public function __construct($con){
        $this->con = $con;
    }

    // Find BY ID
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

    // Delete
    public function delete($id): bool {
        $stm = $this->con->prepare("DELETE * FROM coche WHERE id = :id");
        $stm->execute(['id' =>$id]);

        return $stm->rowCount() > 0;
    }

    // Find All
    public function findAll(): array{
        $stm = $this->con->prepare("SELECT * FROM coche");
        $stm->execute();

        $coches = [];
        while ($registro = $stm->fetch()){
            $coche = new Coche();

            $coche->id = $registro['id'];
            $coche->modelo = $registro['modelo'];
            $coche->marca = $registro['marca'];

            $coches[] = $coche;
        }
        return $coches;
    }

    // Update
    public function update($coche){
        $stm = $this->con->prepare("UPDATE coche SET modelo = :modelo, marca = :marca WHERE id = :id");
        $stm->execute([
            'id' => $coche->id,
            'modelo' => $coche->modelo,
            'marca' => $coche->marca
        ]);
        return $stm->rowCount() > 0;
    }
}