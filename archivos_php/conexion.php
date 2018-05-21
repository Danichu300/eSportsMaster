<?php
//Conexión de la base de datos

$conn = new mysqli("localhost", "root", "", "esportsreview");

if ($conn->connect_errno) {
    header('location: fallo_conexion.php');
    printf("Connect failed: %s\n", $conn->connect_error);
    exit();
}


mysqli_set_charset($conn, 'utf8');
?>