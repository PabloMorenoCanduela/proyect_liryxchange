<?php
require_once 'includes/config.php';
require_once 'includes/src/clases/Cancion.php';

// Obtener los datos de la base de datos 

// Comprobar si el usuario ha iniciado sesión
if (!isset($_SESSION['login'])) {
    //Si el usuario no ha iniciado sesión, seleccionar todas las canciones
    $sql = "SELECT id_cancion, nombre, servidor_fotos FROM canciones";
} else {
    // Si el usuario ha iniciado sesión, seleccionar todas las canciones excepto las del usuario
    $sql = "SELECT id_cancion, nombre, servidor_fotos FROM canciones WHERE id_usuario != '{$_SESSION["nombre"]}'";
}

$result = $conn->query($sql);
$tituloPagina = 'Index';

$contenidoPrincipal = "";

if (isset($_SESSION['login'])){
    // Si el usuario es un administrador, añadir un botón para acceder al panel de administración
    if (isset($_SESSION['esAdmin'])){
        $contenidoPrincipal .= "<div class='botonAdminIndex'><a href= admin.php><button type=button>Panel de Administración</button></a></div>";
    }
}

// Añadir un formulario de búsqueda en la página
$contenidoPrincipal .= <<<EOS
  <form action="buscar.php" method="POST" id="buscar">
  <input type="text" id="termino" name="termino" placeholder=" Busca tu canción">
  <button type="submit">Buscar</button>
  </form>
  EOS;

// Si se han encontrado canciones en la base de datos
if ($result->num_rows > 0) {

    // Añadir un slideshow con las imágenes de las canciones
    $contenidoPrincipal .= "
    
    <div class='slideshow-container'>";
    $i = 0;

    while($row = $result->fetch_assoc()) {
        $i++;
        $id_cancion = $row['id_cancion'];
        $servidor_fotos = $row['servidor_fotos'];
        $nombre = $row['nombre'];

        $contenidoPrincipal .= "
            <div class='slider fade'>
                <a href='mostrarCancion.php?cancion=" . $id_cancion . "'>
                <img src='". $servidor_fotos ."'>
                <div class='nombre-cancion'>". $nombre ."</div>
            </div>
        ";
    }

    // Añadir botones para avanzar y retroceder en el slideshow
    $contenidoPrincipal .= "
        <a class='prev' onclick='siguiente(-1)'>❮</a>
        <a class='next' onclick='siguiente(1)'>❯</a>
        </div>
        <br>

        <div class='puntos'>
    ";

    // Añadir puntos para indicar la posición actual del slideshow
    $j = 0;
    while($j < $i){
        $j++;

        $contenidoPrincipal.= "<span class='punto' onclick='actual(". $j .")'></span>";
    }

    $contenidoPrincipal .= "</div>
    <script>mostrar(1);</script>
    ";

    // Añadir una sección con las canciones mejor valoradas

/*
    // Obtener todas las canciones que no son del propio usuario
    $canciones = cancion::devuelveRestodecanciones();

    // Función de comparación para ordenar por estrellas de forma descendente
    function compararPorEstrellas($cancion1, $cancion2) {
        $estrellas1 = intval($cancion1->getEstrellas());
        $estrellas2 = intval($cancion2->getEstrellas());
        return $estrellas2 - $estrellas1;
    }
    
    
    // Ordenar el array de canciones por estrellas
    usort($canciones, 'compararPorEstrellas');

    // Obtener las tres primeras canciones del array ordenado
    $mejorescanciones = array_slice($canciones, 0, 3);

    $contenidoPrincipal .= "<div class='mejor-valoradas'>
    <h2>CANCIONES MEJOR VALORADAS</h2>";

    // Mostrar las tres mejores canciones
    foreach ($mejorescanciones as $cancion) {
        $id_cancion = $cancion->getIdcancion();
        $nombre = $cancion->getNombre();
        $estrellas = $cancion->getEstrellas();
        $foto = $cancion->getFoto();
        
        $contenidoPrincipal .= 
        "<div class='mejor-cancion'>
            <a href='mostrarcancion.php?cancion=$id_cancion'>
            <img src='$foto' alt='Imagen de la cancion'>
            <p>$nombre $estrellas/5</p>
            </a>
        </div>";
                     
    }
    $contenidoPrincipal .=  "</div>";

*/
    $contenidoPrincipal .= "
       <div class= 'como-funciona'>
       <h2>QUÉ ES LYRIXCHANGE</h2>
       <p>Nuestra web de intercambio de canciones es una plataforma en línea que permite a los usuarios compartir sus canciones favoritas con otros usuarios de la comunidad. Es un espacio donde se puede descubrir y explorar música nueva y conectar con personas que tienen intereses musicales similares.<br><br>

       En nuestra web, los usuarios pueden crear perfiles, subir y compartir sus canciones favoritas, crear listas de reproducción, comentar y calificar las canciones de otros usuarios, y seguir a otros miembros de la comunidad. También ofrecemos herramientas de búsqueda para ayudar a los usuarios a encontrar canciones que les gusten según su género, artista o título de la canción.<br><br>
       
       Además, nuestra web se esfuerza por proporcionar una experiencia de usuario intuitiva y fácil de usar, con una interfaz clara y accesible para todos los usuarios. La seguridad y privacidad de nuestros usuarios es una de nuestras principales preocupaciones, y nos aseguramos de proteger sus datos y de cumplir con los estándares y regulaciones en materia de protección de datos.
       
       <br><br>
       </p>
       </div>
    ";
    $result->free();
}

$contenidoPrincipal .= <<<EOS
EOS;

require('./includes/vistas/plantillas/plantilla.php');

?>