<?php
require_once '../../config.php';
require_once '../clases/Cancion.php';

$id_cancion = $_GET["id_cancion"];

// Si llega aquí sin ID de la casa error porque no sabe cúal eliminar
if(!isset($id_cancion)){
    $mensaje =  "Lo sentimos! Ha habido un error eliminando la cancion";
    if (!isset($_SESSION['esAdmin'])){
        echo "<meta http-equiv='refresh' content='0; url=../../../miCuenta.php?mensaje=".$mensaje."'>";
    }
    else{
        echo "<meta http-equiv='refresh' content='0; url=../../../gestionarCanciones.php?mensaje=".$mensaje."'>";
    }
}

// Elimina
$delete = cancion::elimina($id_cancion);

// Mensajes de resultado
if ($delete){
    $mensaje = "La cancion ha sido eliminada con éxito!";
}
else{
    $mensaje = "Lo sentimos! Ha ocurrido un error eliminando la cancion!";
}

// Redirige
if (!isset($_SESSION['esAdmin'])){
    echo "<meta http-equiv='refresh' content='0; url=../../../miCuenta.php?mensaje=".$mensaje."'>";
}
else{
    echo "<meta http-equiv='refresh' content='0; url=../../../gestionarCanciones.php?mensaje=".$mensaje."'>";
}
?>