<?php

//Requerimos la conexión para poder acceder a la base de datos
require("archivos_php/conexion.php");
//Si ha habido error en la conexión, se notifica
if ($conn->connect_error) {
    die("connection failed: " . $conn->connect_error);
}
//Abrimos la sesión
session_start();
//Cogemos el usuario recibido desde la petición
$usuario = $_POST["usuario"];
//Cogemos la contraseña recibida desde la petición y la encriptamos con hash
$password = crypt($_POST["password"], '$2y$10$fXJEsC0zWAR2tDrmlJgSaecbKyiEOK9GDCRKDReYM8gH2bG2mbO4e');
//Pasamos el permiso de admin, que es 0 (es decir, no es admin)
$admin = 0;
//Sacamos todos los usuarios para ver si el que se pretende registrar ya está registrado
$sql = "SELECT * FROM usuario WHERE nombre_usuario = '" . $usuario . "' AND password = '" . $password . "'";
//Ejecutamos la consulta
$result = $conn->query($sql);
$ok = false;
//Si la consulta devuelve alguna fila quiere decir que ya está registrado
if ($result->num_rows > 0) {
    //Devolvemos un 404 para que la petición salga errónea
   $ok = false;
    //Si no, quiere decir que el usuario no está registrado
} else if($usuario != null && $_POST["password"] != null){
    //Introducimos los datos del usuario en la base de datos
    $sql = "INSERT INTO usuario (nombre_usuario, password, admin) VALUES ('" . $usuario . "','" . $password . "'," . $admin . ")";
    //Ejecutamos la consulta
    if ($conn->query($sql)) {
        //Creamos la sesión con el nombre del usuario
        $_SESSION['nombre_usuario'] = $usuario;
    }
    //Devolvemos un 200 si todo ha ido bien
    $ok = true;
}
 if ($ok) {
        //Enviamos un 200 para indicar que la petición se ha realizado correctamente
        http_response_code(200);
        //Si no se ha encontrado el usuario
    } else {
        //Enviamos un 404 para indicar que la petición no ha ido bien
        http_response_code(404);
    }


?>