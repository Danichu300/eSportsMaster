<?php
require("archivos_php/conexion.php");
if ($conn->connect_error){
  die("connection failed: " . $conn->connect_error);
}
session_start();
$login = false;
$usuario = $_POST["usuario"];
$password =  $_POST["password"];
$sql = "SELECT * FROM usuario";
$result = $conn->query($sql);
echo "<br>";
if($result->num_rows > 0){
  while($row = $result->fetch_assoc()){
    if($usuario == $row["nombre_usuario"] && $password == $row["password"]){
      $login = true;
      $_SESSION["nombre_usuario"] = $usuario;
      break;
    }
  }
}
  if($login == true){
    header('location: index.php');
  } else {
    header('location: pantalla_login_error.php');
  }
?>