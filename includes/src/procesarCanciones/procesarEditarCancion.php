<?php
require_once '../../config.php';
require_once '../clases/Usuario.php';
require_once '../clases/Cancion.php';

$mensaje = "";

if (($_SERVER["REQUEST_METHOD"] == "POST") && (!isset($_POST['delete']))) {

    // Cogemos los datos del formulario y actualizamos la base de datos
    //los ifs son por si queremos solo modificar un campo y mantener los datos anteriores

    $campos = array();

    $id_usuario = (int) ($_REQUEST['id_usuario'] ?? '');
    if (!empty($id_usuario)) {
        $campos[] = "id_usuario = $id_usuario";
    }

    $nombre = htmlspecialchars(trim(strip_tags($_REQUEST["nombre"])));
    if (!empty($nombre)) {
        $campos[] = "nombre = '$nombre'";
    }

    $artista = htmlspecialchars(trim(strip_tags($_REQUEST["artista"])));
    if (!empty($artista)) {
        $campos[] = "artista = '$artista'";
    }

    $numero_valoraciones = (int) ($_REQUEST['numero_valoraciones'] ?? '');
    if (!empty($numero_valoraciones)) {
        $campos[] = "numero_valoraciones = $numero_valoraciones";
    }

    // Procesar la imagen
    if (isset($_FILES['servidor_fotos'])) {
    // Verificar que se ha subido un archivo y no ha ocurrido ningún error
        if ($_FILES['servidor_fotos']['error'] === UPLOAD_ERR_OK) {
            // Verificar que el archivo subido es una imagen
            $tipo_imagen = exif_imagetype($_FILES['servidor_fotos']['tmp_name']);
            if ($tipo_imagen !== IMAGETYPE_JPEG && $tipo_imagen !== IMAGETYPE_PNG) {
                $mensaje =  "Error: el archivo subido no es una imagen.";
                echo "<meta http-equiv='refresh' content='1; url=../../../editarCancion.php?mensaje=".$mensaje."'>";
                exit;
            }
            // Verificar que el tamaño del archivo es menor o igual a 2 MB
            if ($_FILES['servidor_fotos']['size'] > 2 * 1024 * 1024) {
                $mensaje =  "Error: el archivo subido es demasiado grande (máximo 2 MB).";
                echo "<meta http-equiv='refresh' content='1; url=../../../editarCancion.php?mensaje=".$mensaje."'>";
                exit;
            }

            $ruta_imagen = '../../../imagenes/';
            $nombre_imagen = uniqid() . '.' . pathinfo($_FILES['servidor_fotos']['name'], PATHINFO_EXTENSION);
            $ruta_destino = $ruta_imagen . $nombre_imagen;
            move_uploaded_file($_FILES['servidor_fotos']['tmp_name'], $ruta_destino);
            $ruta_imagen = './imagenes/';
            $ruta_destino = $ruta_imagen . $nombre_imagen;
            $campos[] = "servidor_fotos = '$ruta_destino'";
        } 
    }

    $letra = htmlspecialchars(trim(strip_tags($_REQUEST["letra"])));
    if (!empty($letra)) {
        $campos[] = "letra = '$letra'";
    }

    $estrellas = (int) ($_REQUEST['estrellas'] ?? '');
    if (!empty($estrellas)) {
        $campos[] = "estrellas = $estrellas";
    }
    else{
        if (!empty($campos)) {
            $camposStr = implode(", ", $campos);
            $cancion = (int)$_GET['id_cancion'];
            $edited = Cancion::edita($cancion, $camposStr);
            // Mensajes de resultado
            if ($edited){
                $mensaje = "Se ha editado la cancion $nombre correctamente";
            }
            else{
                $mensaje = "Lo sentimos! Ha ocurrido un error editando la cancion $nombre";
            }
        }
    }
}

// Redirige
if (!isset($_SESSION['esAdmin'])){
    echo "<meta http-equiv='refresh' content='0; url=../../../miCuenta.php?mensaje=".$mensaje."'>";
}
else{
    echo "<meta http-equiv='refresh' content='0; url=../../../gestionarCanciones.php?mensaje=".$mensaje."'>";
}


?>