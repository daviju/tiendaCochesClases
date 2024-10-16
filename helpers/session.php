<?php

// PRIMERA PARTE
function iniciaSesion(){
    session_start();
}

function leerSession($usuario) {
    if(isset($_SESSION['$usuario'])){
        return $_SESSION['$usuario'];
    } else {
        return "";
    }
}

function escribirSession($clave, $valor){
    $_SESSION[$clave] = $valor;
}

function cierraSesion($_SESSION){
    session_unset($_SESSION); // Eliminar todas las variables de sesión
}
