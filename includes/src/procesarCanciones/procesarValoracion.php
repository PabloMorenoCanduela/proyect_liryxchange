<?php

require_once '../../config.php';
require_once '../clases/Valoracion.php';
require_once '../clases/Cancion.php';


// Capturo las variables
$id_usuario = htmlspecialchars(trim(strip_tags($_SESSION['nombre']))); 
$estrellas = htmlspecialchars(trim(strip_tags($_POST['estrellas'])));
$id_cancion = htmlspecialchars(trim(strip_tags($_POST['id_cancion'])));
 
//Crea la valoracion en la bd
$valoracion = Valoracion::crea($id_cancion, $id_usuario, $estrellas);

//Recalcular la media de estrellas con la nueva valoracion

//Estas variables no hacen falta pero la funcion las devuelve por referencia
$five_star_percentage = 0;
$four_star_percentage = 0;
$three_star_percentage = 0;
$two_star_percentage = 0;
$one_star_percentage = 0;
$average_rating = 0;
$total_five_star_review = 0;
$total_four_star_review = 0;
$total_three_star_review = 0; 
$total_two_star_review = 0; 
$total_one_star_review = 0;

$average_rating = Valoracion::calcula($id_cancion, $five_star_percentage, $four_star_percentage, $three_star_percentage, $two_star_percentage, $one_star_percentage, $total_five_star_review, $total_four_star_review, $total_three_star_review, $total_two_star_review, $total_one_star_review);

$actualizacion = Cancion::nuevaValoracion($id_cancion, $average_rating);



//Mensajes de resultado
if($valoracion){
    $mensaje = "Se ha creado la valoracion correctamente ";
}else{
    $mensaje = "Lo sentimos! Ha habido un error creando la valoracion";
}

// Redirige
if (!isset($_SESSION['esAdmin'])){
    echo "<meta http-equiv='refresh' content='0; url=../../../miCuenta.php?mensaje=".$mensaje."'>";
}
else{
    echo "<meta http-equiv='refresh' content='0; url=../../../gestionarValoraciones.php?mensaje=".$mensaje."'>";
}


?>
