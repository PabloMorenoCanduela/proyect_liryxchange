<?php
require_once 'includes/config.php';

// Creamos el formulario de búsqueda
$contenidoPrincipal=<<<EOS
  <form action="buscar.php" method="POST" id="buscar">
  <input type="text" id="termino" name="termino" placeholder=" Busca tu canción">
  <button type="submit">Buscar</button>
</form>
EOS;

// Verificamos si se ha enviado un término de búsqueda
if (isset($_POST['termino'])) {
    // Obtenemos el término de búsqueda enviado por el usuario
    $search_term = $_POST['termino'];
    
    // Si no ha iniciado sesión, hacemos una consulta a la base de datos para buscar canciones
    if(!isset($_SESSION['login'])){
        $sql = "SELECT nombre, artista, id_cancion, servidor_fotos FROM canciones WHERE (artista LIKE '%$search_term%' OR nombre LIKE '%$search_term%' OR letra LIKE '%$search_term%')";
    }
    else{
        // Si ha iniciado sesión, hacemos una consulta a la base de datos para buscar canciones que no pertenezcan al usuario actual
        $sql = "SELECT nombre, artista, id_cancion, servidor_fotos FROM canciones WHERE (artista LIKE '%$search_term%' OR nombre LIKE '%$search_term%' OR letra LIKE '%$search_term%') AND id_usuario != '{$_SESSION["nombre"]}'";
    }

    // Ejecutamos la consulta y obtenemos el resultado
    $result= $conn->query($sql);


    // Verificamos si se encontraron resultados
    if ($result->num_rows > 0) {
        //$contenidoPrincipal .= "<h1>cancionS QUE COINCIDEN CON LA BÚSQUEDA:</h1>";

         // Recorremos los resultados y los mostramos en pantalla
        while($row = $result->fetch_assoc()) {

            $id_cancion = $row['id_cancion'];
            $nombre = $row['nombre'];
            $artista = $row['artista'];
            $servidor_fotos = $row['servidor_fotos'];

            $contenidoPrincipal .= "<h2> <a href = mostrarCancion.php?cancion=".$id_cancion.">" . $nombre . "</a> en " . $artista . "</h2>" .
            "<a href='mostrarCancion.php?cancion=".$id_cancion."'>
                <img src='" . $servidor_fotos ."' alt='Imagen de la cancion' id='imagenes-pagina-index'>
            </a>";
        }
        $result->free();
    } 
    else {
        $contenidoPrincipal .= "<h1>No hay cancions que coincidan con tu búsqueda</h1><br>";
    }
}
else{

    // Verificamos si el usuario ha iniciado sesión
    if (!isset($_SESSION['login'])) {
        $sql = "SELECT id_cancion, nombre, servidor_fotos, artista FROM canciones";
    } else {

        // Si no ha iniciado sesión, hacemos una consulta a la base de datos para obtener todas las canciones
        $sql = "SELECT id_cancion, nombre, servidor_fotos, artista FROM canciones WHERE id_usuario != '{$_SESSION["nombre"]}'";
    }
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        //$contenidoPrincipal .= "<h1>cancionS QUE COINCIDEN CON LA BÚSQUEDA:</h1>";
        // Recorremos los resultados y los mostramos en pantalla
        while($row = $result->fetch_assoc()) {
            $id_cancion = $row['id_cancion'];
            $nombre = $row['nombre'];
            $artista = $row['artista'];
            $servidor_fotos = $row['servidor_fotos'];

            $contenidoPrincipal .= "<h2> <a href = mostrarCancion.php?cancion=".$id_cancion.">" . $nombre . "</a> en " . $artista . "</h2>" .
            "<a href='mostrarCancion.php?cancion=".$id_cancion."'>
                <img src='" . $servidor_fotos ."' alt='Imagen de la cancion' id='imagenes-pagina-index'>
            </a>";
        }
        $result->free();
    } 
}

$tituloPagina = 'Búsqueda';

require ('./includes/vistas/plantillas/plantilla.php');
?>
