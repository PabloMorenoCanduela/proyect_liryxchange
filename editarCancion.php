<?php
require_once 'includes/config.php';
require_once 'includes/src/clases/Cancion.php';

$id_cancion = (int)$_GET['id_cancion'];
$datos_cancion =Cancion::datos($id_cancion);

$nombre = $datos_cancion['nombre'];
$artista = $datos_cancion['artista'];
$servidor_fotos = $datos_cancion['servidor_fotos'];
$letra = $datos_cancion['letra'];

$tituloPagina = 'Edición de Mi Canción';
$contenidoPrincipal = <<<EOS
<form class='form-marco' action="includes/src/procesarCanciones/procesarEditarCancion.php?id_cancion=$id_cancion" method="POST" enctype="multipart/form-data">
<fieldset><br>
    <div><label>Nombre:</label> <input type="text" name="nombre" value="{$nombre}" / required></div><br>
    <div><label>Artista:</label> <input type="text" name="artista" value="{$artista}" / required></div><br>
    <div><label>Imagen:</label> <input type="file" name="servidor_fotos" value="{$servidor_fotos}" /></div><br>
    <div><label>Letra:</label><textarea name="letra" class="cuadro-input" required>{$letra}</textarea></div><br>
    <button type="submit">Guardar</button>
</fieldset>
</form>
EOS;

require ('./includes/vistas/plantillas/plantilla.php');
?>


