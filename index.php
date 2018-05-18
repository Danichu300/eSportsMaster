<?php

//Iniciamos la sesión
session_start();
//Comprobamos si la sesión del usuario está activa para permitir el login
if (isset($_SESSION['nombre_usuario'])) {
    //Si está activa, se redirige a la página principal
    header('location: home.html');
    //Si la sesión del usuario no está activa
} else {
    //Se vuelven a pedir las credenciales
    include 'pantalla_login.php';
}

?>