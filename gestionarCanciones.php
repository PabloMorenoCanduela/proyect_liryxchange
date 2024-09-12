<?php

require_once 'includes/config.php';

// Importa la clase canciones
require_once 'includes/src/clases/Cancion.php';

$tituloPagina = 'Administrador canciones';

// Obtiene todas las canciones de la base de datos
$canciones = Cancion::devuelveTodasLascanciones();

$datos = '';

//recoge la info de todas las cancion
foreach ($canciones as $cancion) {

    $datos .= "<div id ='div-datos'>
                <img src='{$cancion->getFoto()}' alt='Imagen de la cancion' id='imagenes-mis-canciones'>
                    <p>
                        <strong>ID cancion:  </strong>{$cancion->getIdcancion()}<br>
                        <strong>ID usuario:  </strong>{$cancion->getIdUsuario()}<br>
                        <strong>Nombre: </strong>{$cancion->getNombre()}<br>
                        <strong>Artista:  </strong>{$cancion->getLocal()}<br>
                        <strong>Valoraciones:  </strong>{$cancion->getVal()}<br>
                        <strong>Letra: </strong>{$cancion->getDescr()}<br>                        
                        <strong>Estrellas:  </strong>{$cancion->getEstrellas()}<br>

                    </p>

                    <br>
                    <a href=\"editarCancion.php?id_cancion={$cancion->getIdcancion()}\"><button type=\"button\">Editar cancion</button></a>
                    <button id='boton-eliminar-cuenta' type='button' onclick='eliminarCancion({$cancion->getIdcancion()})'>Eliminar cancion</button>
                </div>";
}


$contenidoPrincipal=<<<EOS

    <h1>Gestionar canciones</h1>
    $datos

EOS;

require ('./includes/vistas/plantillas/plantilla.php');
?>