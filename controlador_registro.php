<?php

require("archivos_php/conexion.php");
if ($conn->connect_error) {
    die("connection failed: " . $conn->connect_error);
}
session_start();
$login = false;
$usuario = $_POST["usuario"];
$password = $_POST["password"];
$admin = 0;
/* $sql = "INSERT INTO usuario (id_usuario, nombre_usuario, password, admin) VALUES (null,'" . $usuario . "','" . $password . "'," . $admin . ")";
  if($conn->query($sql)){
  $login = true;
  $_SESSION['nombre_usuario'] = $usuario;
  }
  if($login){
  $sql = "SELECT * FROM usuario WHERE nombre_usuario = '" . $usuario . "'";
  http_response_code(200);
  if($conn->query($sql)){
  http_response_code(404);
  header('Location: pantalla_login_error.php');
  }

  } */

$sql = "SELECT * FROM usuario WHERE nombre_usuario = '" . $usuario . "'";
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