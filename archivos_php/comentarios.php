<?php
//Incluimos la conexión para acceder a la base de datos
require './conexion.php';
//Cogemos el usuario del comentario
$user = $_POST['user_comment'];
//Cogemos el comentario
$texto = $_POST['text_comment'];
//Cogemos el videojuego asociado
$videojuego = $_POST['videojuego'];
//Buscamos el usuario para saber si está en la base de datos
$buscarUsuario = "SELECT id_usuario FROM usuario WHERE nombre_usuario = '" . $user . "'";
//Ejecutamos la consulta
$result = $conn->query($buscarUsuario);
//Guardamos los registros
$row = $result->fetch_array();
//Si ha ido bien
if ($result) {
    //Consulta para insertar el comentario
    $sql = "INSERT INTO comentario (id_comentario, usuario, contenido, videojuego, fecha_comentario) VALUES (null," . $row['id_usuario'] . ",'" . $texto . "','" . $videojuego . "',CURRENT_TIMESTAMP())";
    //Ejecutamos la consulta
    $resultado = $conn->query($sql);
    //Si ha ido bien
    if ($resultado) {
        //Redirigimos a la página principal
        header("Location: ../home.html");
        //Si no ha ido bien
    } else {
        //Mostramos el error de la consulta
        echo mysqli_error($conn);
    }
}
//En cualquier caso, redirigimos a la página principal
header("Location: ../home.html");


//}

/* function cargarComentarios() {
  $sql = "SELECT usuario, contenido FROM comentarios ORDER BY fecha_comentario";
  } */
?>