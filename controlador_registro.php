<?php

require("archivos_php/conexion.php");
if ($conn->connect_error){
  die("connection failed: " . $conn->connect_error);
}
session_start();
$login = false;
$usuario = $_POST["usuario"];
$password =  $_POST["password"];
$admin = 0;
$sql = "INSERT INTO usuario (id_usuario, nombre_usuario, password, admin) VALUES (null,'" . $usuario . "','" . $password . "'," . $admin . ")";
if($conn->query($sql)){
 $login = true;
 $_SESSION["nombre_usuario"] = $usuario;
}
if($login == true){
  header('Location: index.php');
} else {
  header('Location: pantalla_login_error.php');
}
   
?>