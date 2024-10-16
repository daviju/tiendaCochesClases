<?php
// Crear
// Leer
// Actualizar
// Borrar

interface RepoCrud {
    public function create($item);
    public function read($id);
    public function update($id, $item);
    public function delete($id);
    public function getAll();
}