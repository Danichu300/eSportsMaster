<?php

require ("./conexion.php");

$user_name = $_POST['id_admin'];
$user_password = $_POST['pass_admin'];

$sql = "SELECT admin FROM usuario WHERE id_usuario = " . $user_name . " AND password = '" . $user_password . "'";

$result = $conn->query($sql);

$row = $result->fetch_assoc();

if ($row['admin'] == 1) {
   session_start();
    $_SESSION["id_admin"] = $user_name;
    header("Location: ./crearnoticia.php");
    echo "ok";
} else {
    header("Location: ../index.html");
}
?>