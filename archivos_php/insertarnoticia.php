<?php

require("./conexion.php");
session_start();

$titulo = $_POST['titulo_noticia'];
$contenido = $_POST['contenido_noticia'];
if(isset($_POST['imagen_noticia'])){
    $imagen = $_POST['imagen_noticia'];
} else {
    $imagen = null;
}

$videojuego = $_POST['videojuego_noticia'];
$admin = $_SESSION['id_admin'];

$sql = "INSERT INTO noticia (id_noticia,admin,titulo,contenido,imagen,videojuego) VALUES (null," . $admin . ",'" . $titulo . "','" . $contenido . "','" . $imagen . "','" . $videojuego . "')";

$result = $conn->query($sql);

if($result){
    header("Location: ../index.html");
} else {
    echo mysqli_error($conn);
}

?>