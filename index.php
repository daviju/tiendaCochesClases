<?php
require_once "Repositorio/Conexion.php";
require_once "modelo/Coche.php";
require_once "Repositorio/RepoCoche.php";

$rc = new RepoCoche(Conexion::getConection());

$miCoche = $rc->findByID(1);
var_dump($miCoche);