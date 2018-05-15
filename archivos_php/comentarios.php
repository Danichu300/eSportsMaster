<?php

//guardarComentario();
//function guardarComentario() {
require './conexion.php';

$user = $_POST['user_comment'];
$texto = $_POST['text_comment'];
$videojuego = $_POST['videojuego'];

$buscarUsuario = "SELECT id_usuario FROM usuario WHERE nombre_usuario = '" . $user . "'";

$result = $conn->query($buscarUsuario);

$row = $result->fetch_array();

if ($result) {

    $sql = "INSERT INTO comentario (id_comentario, usuario, contenido, videojuego, fecha_comentario) VALUES (null," . $row['id_usuario'] . ",'" . $texto . "','" . $videojuego . "',CURRENT_TIMESTAMP())";

    $resultado = $conn->query($sql);

    if ($resultado) {
        header("Location: ../noticias/csgo.php#formularioComentarios");
    } else {
        echo mysqli_error($conn);
    }
}

header("Location: ../index.html");


//}

/* function cargarComentarios() {
  $sql = "SELECT usuario, contenido FROM comentarios ORDER BY fecha_comentario";
  } */
?>