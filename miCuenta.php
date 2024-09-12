<?php
//No te puedes meter a tu cuenta sin haber Iniciado Sesión
require_once 'includes/config.php';
require_once 'includes/src/clases/Usuario.php';
require_once 'includes/src/clases/Valoracion.php';



//Sesión Iniciada
if (isset($_SESSION["login"])) {
    $admin = "SELECT * FROM usuarios WHERE correo = '${_SESSION["nombre"]}'";
    $resultado = $conn->query($admin);

    $id_usuario = $_SESSION["nombre"];
    $sql = "SELECT * FROM canciones WHERE  id_usuario = '${_SESSION["nombre"]}'";
    $result = $conn->query($sql);
    $canciones = "";

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $nombre = $row['nombre'];
            $artista = $row['artista'];
            $servidor_fotos = $row['servidor_fotos'];
            $letra = $row['letra'];
            $id_cancion = $row['id_cancion'];

            $canciones .= "<h4>" . $nombre . " de " . $artista . "</h4>" . "<div id='div-canciones'>" . '<img src="' . $servidor_fotos . '"
            alt="Imagen de la cancion" id="imagenes-mis-canciones"><div class="descripcion-cancion"><p>' . $letra . "</p></div>" .
                "<a href='editarCancion.php?id_cancion=" . $id_cancion . "'><button id='boton-editar-cancion' type='button'>Editar</button></a><br>" .
                "<button id='boton-eliminar-cancion' type='button'name='delete' onclick='eliminarCancion($id_cancion)'>Eliminar</button></a></div>";

        }
        $result->free();
    } else {
        $canciones = "No tienes canciones publicadas";
    }

    $sql = "SELECT correo, nombre, sexo, fecha_nacimiento, pais, fecha_registro, servidor_fotoperfil FROM usuarios WHERE correo = '${_SESSION["nombre"]}'";

    $result = $conn->query($sql);
    $datos = "";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $correo = $row["correo"];
            $fecha_nacimiento = $row["fecha_nacimiento"];
            $sexo = $row["sexo"];
            $pais = $row["pais"];
            $servidor_fotoperfil = $row["servidor_fotoperfil"];
            $nombre = $row["nombre"];

            $datos .= "<div id ='div-datos'> <img src='" . $servidor_fotoperfil ."' alt='Foto de perfil' id='foto-perfil'>
                <p><strong>" . "Correo: </strong>" . $correo . "<br><strong>Nombre:  </strong>" . $nombre
                . "<br><strong>Género: </strong>" . $sexo .
                "<br><strong>Fecha de nacimiento: </strong>" . $fecha_nacimiento . "<br><strong>País: </strong>" . $pais . "<br>" . "</p></div>";
        }
        $result->free();
    } else {
        $datos = "No hay datos del usuario";
    }
    
    //MIS VALORACOINES

    $sql = "SELECT id_valoracion, id_cancion, id_usuario, estrellas FROM valoraciones WHERE id_usuario = '${_SESSION["nombre"]}'";

    $result = $conn->query($sql);
    $valoraciones = "";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id_valoracion = $row["id_valoracion"];
            $id_cancion = $row["id_cancion"];
            $estrellas = $row["estrellas"];

            $sql2 = "SELECT * FROM canciones WHERE id_cancion = '$id_cancion'";
            $result2 = $conn->query($sql2);
            if ($result2->num_rows > 0) {
                while ($row2 = $result2->fetch_assoc()) {
                    $nombre = $row2["nombre"];
                    $valoraciones .= "<div id ='div-valoracion'> <p><strong>Nombre de la cancion: </strong>" . $nombre . "<br><strong>Estrellas: </strong>" . $estrellas .
                     "<br>" . "</p>" . 
                    "<button id='boton-eliminar-valoracion' type='button'name='delete' onclick='eliminarValoracion($id_valoracion)'>Eliminar</button></a></div>";

                }
            }
        }
        $result->free();
    } else {
        $valoraciones = "No hay valoraciones del usuario";
    }
    


    $mensaje = "Bienvenido/a a tu cuenta {$_SESSION["nombre"]}";
    $tituloPagina = 'MiCuenta';
    $contenidoPrincipal = <<<EOS
    <h3>MIS DATOS</h3>
    $datos
    <br>    
    EOS;

    if (!isset($_SESSION['esAdmin'])) {
        $contenidoPrincipal .= <<<EOS
        <a href="edicionLosDatos.php?id_usuario=$id_usuario"><button type="button">Editar mis datos</button></a>
        <a href="cambiarContrasena.php?id_usuario=$id_usuario"><button type=\"button\">Cambiar contraseña</button></a>
        <button id='boton-eliminar-cuenta' type='button' onclick='eliminarCuenta("$id_usuario")'>Eliminar cuenta</button></a> 
        EOS;
    }

    while ($row1 = $resultado->fetch_assoc()) {
        // usuario estándar
        if ($row1["tipo"] == 2){ 
            $contenidoPrincipal .= "<br>
            <h3>MIS CANCIONES</h3>
            $canciones
            <a href=publicarCancion.php><button type=button>Nueva canción</button></a>
            <br>
            <h3>MIS VALORACIONES </h3>
            $valoraciones
            <br>";        
        }
    }

    


    require('./includes/vistas/plantillas/plantilla.php');
}





//Sesión sin Iniciar te lleva a LOGIN
else {
    $mensaje = "Necesitas Iniciar Sesión para acceder a Mi Cuenta";
    echo "<meta http-equiv='refresh' content='0; url=login.php?mensaje=" . $mensaje . "'>";
}
?>