<?php

// SEGUNDA PARTE
function logIn($usuario) {
    $_SESSION['user'] = $usuario;
}

function logOut(){
    session_destroy();
}

function estaLogeado($usuario){
    if(isset($_SESSION['$usuario'])) {
        return true;
    } else {
        return false;
    }
}