<?php

require("archivos_php/conexion.php");
if ($conn->connect_error) {
    die("connection failed: " . $conn->connect_error);
}
session_start();
$login = false;
$usuario = $_POST["usuario"];
$password = crypt($_POST["password"],'$2y$10$fXJEsC0zWAR2tDrmlJgSaecbKyiEOK9GDCRKDReYM8gH2bG2mbO4e');
$admin = 0;

$sql = "SELECT * FROM usuario WHERE nombre_usuario = '" . $usuario . "' AND password = '" . $password . "'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    //header('Location: pantalla_login_error.php');
    http_response_code(404);
} else {
    $sql = "INSERT INTO usuario (nombre_usuario, password, admin) VALUES ('" . $usuario . "','" . $password . "'," . $admin . ")";
    if ($conn->query($sql)) {
        $login = true;
        $_SESSION['nombre_usuario'] = $usuario;
       
    }
     http_response_code(200);
}
?>