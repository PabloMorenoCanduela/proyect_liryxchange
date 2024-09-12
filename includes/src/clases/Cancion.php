<?php
require_once 'Aplicacion.php';

class Cancion {

    private $id_cancion;
    private $id_usuario;
    private $nombre;
    private $artista;
    private $numero_valoraciones;
    private $servidor_fotos;
    private $letra;
    private $estrellas;
    
    // Constructor privado para evitar instanciación directa
    private function __construct($id_usuario, $nombre, $artista, $numero_valoraciones, $servidor_fotos, $letra, $estrellas) {
        $uuid = uniqid();
        $this->id_cancion = hexdec(substr($uuid, 0, 8)) & 0x7fffffff;
        $this->id_usuario = $id_usuario;
        $this->nombre = $nombre;
        $this->artista = $artista;
        $this->numero_valoraciones = $numero_valoraciones;
        $this->servidor_fotos = $servidor_fotos;
        $this->letra = $letra;
        $this->estrellas = $estrellas;
    }

    //Getters de los atributos de cancion
    public function getIdcancion()
    {
        return $this->id_cancion;
    }

    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getLocal() {
        return $this->artista;
    }

    public function getVal() {
        return $this->numero_valoraciones;
    }
    public function getDescr() {
        return $this->letra;
    }

    public function getEstrellas() {
        return $this->estrellas;
    }

    public function getFoto() {
        return $this->servidor_fotos;
    }

    //Función que devuelve todas las canciones en la base de datos
    public static function devuelveTodasLascanciones() {
        $conn = Aplicacion::getInstance()->getConexionBd();
        $sql = "SELECT * FROM canciones";
        $result = $conn->query($sql);

        //Definir array de canciones
        $canciones = array();

        if ($result->num_rows > 0) {
            while ($fila = $result->fetch_assoc()) {

                // Crear objeto canciones con los datos de la fila actual
                $cancion = new cancion($fila['id_cancion'], $fila['id_usuario'], $fila['nombre'], $fila['artista'], $fila['numero_valoraciones'], $fila['servidor_fotos'], $fila['letra'], $fila['estrellas']);

                //Meter cada canciones en un array
                $canciones[] = $cancion;
            }
            $result->free();
        }

        // Devolver el array de canciones
        return $canciones;
    }


    //Función que devuelve todas las canciones en la base de datos
    public static function devuelveRestodecanciones() {
        $conn = Aplicacion::getInstance()->getConexionBd();

        // Si no ha iniciado sesión
        if(!isset($_SESSION['login'])){
            $sql = "SELECT * FROM canciones";
        }
        else{
            // Si ha iniciado sesión, hacemos una consulta a la base de datos para buscar canciones que no pertenezcan al usuario actual
            $sql = "SELECT * FROM canciones WHERE id_usuario != '{$_SESSION["nombre"]}'";
        }

        $result = $conn->query($sql);

        //Definir array de canciones
        $canciones = array();

        if ($result->num_rows > 0) {
            while ($fila = $result->fetch_assoc()) {

                // Crear objeto canciones con los datos de la fila actual
                $cancion = new cancion($fila['id_cancion'], $fila['id_usuario'], $fila['nombre'], $fila['artista'], $fila['numero_valoraciones'], $fila['servidor_fotos'], $fila['letra'], $fila['estrellas']);

                //Meter cada canciones en un array
                $canciones[] = $cancion;
            }
            $result->free();
        }

        // Devolver el array de canciones
        return $canciones;
    }


     //Función para insertar una nueva cancion en la base de datos
    private static function inserta($cancion){
        $result = false;
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query=sprintf("INSERT INTO canciones (id_cancion, id_usuario, nombre, artista, numero_valoraciones, servidor_fotos ,letra, estrellas) VALUES (%d, '%s', '%s', '%s', %d, '%s', '%s', %d)"
            , $conn->real_escape_string($cancion->id_cancion) 
            , $conn->real_escape_string($cancion->id_usuario)
            , $conn->real_escape_string($cancion->nombre)
            , $conn->real_escape_string($cancion->artista)
            , $conn->real_escape_string($cancion->numero_valoraciones)
            , $conn->real_escape_string($cancion->servidor_fotos)            
            , $conn->real_escape_string($cancion->letra)
            , $conn->real_escape_string($cancion->estrellas)
        );
        if ( $conn->query($query) ) {
            $result = true;
        } else {
            error_log("Error BD ({$conn->errno}): {$conn->error}");
        }
        return $result;
    }

 //Función para guardar una nueva cancion en la base de datos
    public function guarda(){
        return self::inserta($this);
    }

 //Función para crear una nueva cancion en la base de datos
    public static function crea($id_usuario, $nombre, $artista, $servidor_fotos, $letra){
       
        $cancion = new cancion($id_usuario, $nombre, $artista, 0, $servidor_fotos, $letra, 0);
        $cancion->guarda(); 
        return $cancion;
    }

    //edita y actualiza una cancion en la base de datos
    public static function edita($cancion, $campos){
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query=sprintf("UPDATE canciones SET $campos WHERE id_cancion = $cancion");
        //ejecuta la consulta y si funciona devuelve true
        if ( $conn->query($query) ) {
            return true;
        }
        else{
            return false;
        }
    }

    //elimina una cancion de la base de datos
    public static function elimina($cancion){
        $conn = Aplicacion::getInstance()->getConexionBd();
        $sql = "DELETE FROM canciones WHERE id_cancion = $cancion";
        //ejecuta la consulta y si funciona devuelve true
        if ($conn->query($sql)) {
            return true;
        }
        else{
            return false;
        }
    }

    //funcion para sacar los datos de la base de datos
    public static function datos($id_cancion){
        $conn = Aplicacion::getInstance()->getConexionBd();
        $sql = "SELECT nombre, artista, servidor_fotos, letra FROM canciones WHERE id_cancion = $id_cancion";
        $resultado = $conn->query($sql);
        
        if ($resultado->num_rows > 0) {
            $fila = $resultado->fetch_assoc();
    
            $nombre = $fila['nombre'];
            $artista = $fila['artista'];
            $servidor_fotos = $fila['servidor_fotos'];
            $letra = $fila['letra'];
    
            //liberamos memoria
            $resultado->free();
    
            return array(
                'nombre' => $nombre,
                'artista' => $artista,
                'servidor_fotos' => $servidor_fotos,
                'letra' => $letra
            );
        } else {
            //devuelve array vacio si no hay resultado
            return array();
        }
    }

    // Actualiza los valores de numero_valoracion y estrellas segun la nueva valoracion
    public static function nuevaValoracion($id_cancion, $estrellas){
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query=sprintf("UPDATE canciones SET numero_valoraciones = numero_valoraciones + 1, estrellas = '$estrellas' WHERE id_cancion = $id_cancion");
        //ejecuta la consulta y si funciona devuelve true
        if ( $conn->query($query) ) {
            return true;
        }
        else{
            return false;
        }
    }
    

} 
?>