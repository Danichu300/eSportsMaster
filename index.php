<?php

session_start();
//SI el usuario esta vació te manda a la pantalla de loguin
if (isset($_SESSION['nombre_usuario'])) {
     
        header('location: home.html');
    
} else {
    include 'pantalla_login.php';
}
?>