<?php

$tituloPagina = 'Administrador';

$contenidoPrincipal=<<<EOS
<div class="bienvenidoAdmin"><h1>Bienvenido al Panel de Administración</h1></div>
<div class="adminPanelContainer">
            <div class="card">
                <div class="face face1">
                    <div class="content">
                    <img src="resources/management.png">
                        <h3>Usuarios</h3>
                    </div>
                </div>
                <div class="face face2">
                    <div class="content">
                        <p>Edita los datos, cambia la contraseña o elimina la cuenta de los usuarios.</p>
                            <a href="gestionarUsuarios.php">Acceder</a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="face face1">
                    <div class="content">
                        <img src="resources/home.png">
                        <h3>Canciones</h3>
                    </div>
                </div>
                <div class="face face2">
                    <div class="content">
                        <p>Edita o elimina las canciones publicadas en LyriXchange.</p>
                            <a href="gestionarCanciones.php">Acceder</a>
                    </div>
                </div>
            </div>				
        </div>

<a href="index.php" class="volverLink">
  <button class="volverButton" type="button">Volver al Inicio</button>
</a>

EOS;

require ('./includes/vistas/plantillas/plantilla.php');
?>
