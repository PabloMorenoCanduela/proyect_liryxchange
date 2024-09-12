<?php
require_once 'includes/config.php';

$tituloPagina = 'Publicar';
$contenidoPrincipal=<<<EOS
<form class='form-marco' action="includes/src/procesarCanciones/procesarPublicarCancion.php" method="POST" enctype="multipart/form-data">
<fieldset>
    <legend>Nueva Canción</legend>
    <div><label>Nombre:</label> <input type="text" name="nombre" required/></div><br>
    <div><label>Artista:</label> <input type="text" name="artista" required/></div><br>
    <div><label>Letra:</label><textarea name="letra" class="cuadro-input" required></textarea></div><br>
    <div><label>Imagen:</label> <input type="file" name="imagen" id="imagen" required></div><br>
</form>
    <input type="submit" value="Publicar">
</fieldset>
EOS;

require ('./includes/vistas/plantillas/plantilla.php');
?>
