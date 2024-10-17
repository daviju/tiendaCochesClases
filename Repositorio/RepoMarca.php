<?php
$base = $_SERVER['DOCUMENT_ROOT'];
require_once "$base/Clases/Marca.php";

class RepoMarca {
    private $con;

    public function __construct($con){
        $this->con = $con;
    }

    // Find BY ID (Clave primaria compuesta: marca, modelo)
    public function findByID($marca, $modelo){
        $stm = $this->con->prepare("SELECT * FROM marca 
                                    WHERE marca = :marca 
                                    AND modelo = :modelo");

        $stm->execute(['marca' => $marca, 'modelo' => $modelo]);

        $registro = $stm->fetch();
        if ($registro) {
            // Crear una nueva instancia de Marca con los valores obtenidos
            return new Marca($registro['marca'], $registro['modelo']);
        }
        return null;
    }

    // Delete (Clave primaria compuesta: marca, modelo)
    public function delete($marca, $modelo): bool {
        $stm = $this->con->prepare("DELETE FROM marca 
                                    WHERE marca = :marca 
                                    AND modelo = :modelo");

        $stm->execute(['marca' => $marca, 'modelo' => $modelo]);

        return $stm->rowCount() > 0;
    }

    // Find All
    public function findAll(): array{
        $stm = $this->con->prepare("SELECT * FROM marca");
        $stm->execute();

        $marcas = [];
        while ($registro = $stm->fetch()){
            $marca = new Marca($registro['marca'], $registro['modelo']);
            $marcas[] = $marca;
        }
        return $marcas;
    }

    // Update (Clave primaria compuesta: marca, modelo)
    public function update($marcaObj){
        $stm = $this->con->prepare("UPDATE marca SET modelo = :modelo 
                                    WHERE marca = :marca");

        $stm->execute([
            'marca' => $marcaObj->marca,
            'modelo' => $marcaObj->modelo
        ]);
        return $stm->rowCount() > 0;
    }
}
