<?php

//Requerimos la conexión para poder acceder a la base de datos
require("archivos_php/conexion.php");
//Si la conexión falla, lo notificamos
if ($conn->connect_error) {
    die("connection failed: " . $conn->connect_error);
}
//Abrimos la sesión
session_start();
//Cogemos el usuario recibido a través de la petición vía post
$usuario = $_POST["usuario"];
//Cogemos la contraseña recibida a través de la petición vía post y la encriptamos
$password = crypt($_POST["password"], '$2y$10$fXJEsC0zWAR2tDrmlJgSaecbKyiEOK9GDCRKDReYM8gH2bG2mbO4e');
//Sacamos todos los usuarios para controlar que el usuario se encuentre en la base de datos
$sql = "SELECT * FROM usuario";
//Ejecutamos la consulta
$result = $conn->query($sql);
//Si devuelve alguna fila quiere decir que el usuario está registrado
if ($result->num_rows > 0) {
    //Variable que controla que se ha encontrado el usuario
    $ok = false;
    //Mientras haya registros en la consulta
    while ($row = $result->fetch_assoc()) {
        //Si coincide el usuario con la contraseña
        if ($usuario == $row["nombre_usuario"] && $password == $row["password"] && $row["nombre_usuario"] != "" && $row["password"] != "") {
            //Creamos la sesión con el nombre de usuario
            $_SESSION["nombre_usuario"] = $usuario;
            //Activamos la variable que controla que el usuario se ha encontrado
            $ok = true;
            //Salimos del bucle
            break;
        }
    }
    //Si se ha encontrado el usuario
    if ($ok) {
        //Enviamos un 200 para indicar que la petición se ha realizado correctamente
        http_response_code(200);
        //Si no se ha encontrado el usuario
    } else {
        //Enviamos un 404 para indicar que la petición no ha ido bien
        http_response_code(404);
    }
    //Si no se devuelve ninguna fila quiere decir que no se ha encontrado el usuario
} else {
    //Enviamos un 404 para indicar que la petición no ha ido bien
    http_response_code(404);
}

?>