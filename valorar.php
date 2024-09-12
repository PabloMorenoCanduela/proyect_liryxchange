<?php
require_once 'includes/config.php';
require_once 'includes/src/clases/Cancion.php';

$id_cancion = (int)$_GET['id_cancion'];

$datos_cancion =Cancion::datos($id_cancion);
$artista = $datos_cancion['artista'];
$nombre = $datos_cancion['nombre'];
$tituloPagina = 'Valorar';  
$contenidoPrincipal ="";


$contenidoPrincipal .= <<<EOS
    <form class='form-marco' action="includes/src/procesarCanciones/procesarValoracion.php" method="POST" enctype="multipart/form-data" onchange="return validarValoracion(this);">
      <fieldset>
        <legend><br>Valorar la canción "$nombre" de $artista</legend>
        <input type="hidden" name="id_cancion" value="$id_cancion">
        <label for="estrellas">Valoración:</label>
        <div class='nuevaValoracion'>
          <input type="radio" name="estrellas" value="1" class="submit_star" id="submit_star_1" data-estrellas="1"><label for="submit_star_1"></label></input>
          <input type="radio" name="estrellas" value="2" class="submit_star" id="submit_star_2" data-estrellas="2"><label for="submit_star_2"></label></input>
          <input type="radio" name="estrellas" value="3" class="submit_star" id="submit_star_3" data-estrellas="3"><label for="submit_star_3"></label></input>
          <input type="radio" name="estrellas" value="4" class="submit_star" id="submit_star_4" data-estrellas="4"><label for="submit_star_4"></label></input>
          <input type="radio" name="estrellas" value="5" class="submit_star" id="submit_star_5" data-estrellas="5" checked><label for="submit_star_5"></label></input>
        </div>
        <br>
        <input type="submit" value="Enviar" id="save-review">
        <br><br>
      </fieldset>
    </form>
EOS;



require ('./includes/vistas/plantillas/plantilla.php');
?>
