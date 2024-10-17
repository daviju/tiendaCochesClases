<?php
// Sirve para cargar automaticamente todos los require
require_once "_autoload.php";

$directorios = ['helpers','modelo','Repositorio'];

foreach($directorios as $directoio){
    spl_autoload_register(function($clase){
        
        $fichero=$_SERVER['DOCUMENT_ROOT'].substr($_SERVER['PHP_SELF'],0,strrpos($_SERVER['PHP_SELF'],'/')).'/helpers/'.$clase.'.php';
        if(file_exists($fichero)){
            include_once $fichero;
        }
    });
}

spl_autoload_register(function($clase){
    $fichero=$_SERVER['DOCUMENT_ROOT'].substr($_SERVER['PHP_SELF'],0,strrpos($_SERVER['PHP_SELF'],'/')).'/helpers/'.$clase.'.php';
    if(file_exists($fichero)){
        include_once $fichero;
    }
});