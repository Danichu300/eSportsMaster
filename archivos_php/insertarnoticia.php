<?php
//Conexión a la base de datos
require("./conexion.php");
//Abrimos la sesión
session_start();
//Cogemos el título de la noticia
$titulo = $_POST['titulo_noticia'];
//Cogemos el contenido de la noticai
$contenido = $_POST['contenido_noticia'];
//Si se ha subido imagen, se coge
if(isset($_POST['imagen_noticia'])){
    $imagen = $_POST['imagen_noticia'];
} else {
    $imagen = null;
}
//Cogemos el videojuego asociado
$videojuego = $_POST['videojuego_noticia'];
//Cogemos el admin
$admin = $_SESSION['id_admin'];
//Consulta para insertar la noticia
$sql = "INSERT INTO noticia (id_noticia,admin,titulo,contenido,imagen,videojuego) VALUES (null," . $admin . ",'" . $titulo . "','" . $contenido . "','" . $imagen . "','" . $videojuego . "')";
//Ejecutamos la consulta
$result = $conn->query($sql);
//Si ha ido bien
if($result){
    //redirigimos a la pantalla principal
    header("Location: ../home.html");
    //Si no ha ido bien
} else {
    //Mostramos un error
    echo mysqli_error($conn);
}

?>