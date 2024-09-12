<?php
require_once 'src/clases/Aplicacion.php';

define('BD_HOST', 'localhost');
define('BD_USER', 'lyrixchange');
define('BD_PASS', 'abd');
define('BD_NAME', 'lyrixchange');

//Conexion con base de datos
$conn = new mysqli(BD_HOST, BD_USER, BD_PASS, BD_NAME);
if ($conn->connect_error) {
    die("La conexión ha fallado" . $conn->connect_error);
}

/**
 * Configuración del soporte de UTF-8, localización (idioma y país) y zona horaria
 */
ini_set('default_charset', 'UTF-8');
setLocale(LC_ALL, 'es_ES.UTF.8');
date_default_timezone_set('Europe/Madrid');

// Inicializa la aplicación
$app = Aplicacion::getInstance();
$app->init(['host' => BD_HOST, 'bd' => BD_NAME, 'user' => BD_USER, 'pass' => BD_PASS]);
?>