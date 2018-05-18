<?php

require("archivos_php/conexion.php");
if ($conn->connect_error) {
    die("connection failed: " . $conn->connect_error);
}
session_start();
$login = false;
$usuario = $_POST["usuario"];
$password = crypt($_POST["password"],'$2y$10$fXJEsC0zWAR2tDrmlJgSaecbKyiEOK9GDCRKDReYM8gH2bG2mbO4e');
$sql = "SELECT * FROM usuario";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $ok = false;
    while ($row = $result->fetch_assoc()) {
        if ($usuario == $row["nombre_usuario"] && $password == $row["password"]) {
            $login = true;
            $_SESSION["nombre_usuario"] = $usuario;
            $ok = true;
            break;
        }
    }
   if($ok){
       http_response_code(200);
   }else{
        http_response_code(404);
   }
   
} else {
    http_response_code(404);
}

?>