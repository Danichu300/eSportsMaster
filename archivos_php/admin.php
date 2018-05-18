<?php
//Incluimos la conexión para acceder a la base de datos
require ("./conexion.php");
//Cogemos la id del admin recibida del formulario
$user_name = $_POST['id_admin'];
//Cogemos la contraseña del admin recibida del formulario
$user_password = $_POST['pass_admin'];
//Consulta para comprobar que el admin es correcto
$sql = "SELECT admin FROM usuario WHERE id_usuario = " . $user_name . " AND password = '" . $user_password . "'";
//Ejecutamos la consulta
$result = $conn->query($sql);
//Guardamos los resultados en la variable
$row = $result->fetch_assoc();
//Si ese usuario tiene el permiso de admin
if ($row['admin'] == 1) {
    //Se abre la sesion
   session_start();
   //Se crea la sesion con la id de admin para evitar brechas de seguridad
    $_SESSION["id_admin"] = $user_name;
    //Redirigimos a la página de crear noticias
    header("Location: ./crearnoticia.php");
    //En caso incorrecto, volvemos al índice
} else {
    header("Location: ../home.html");
}
?>