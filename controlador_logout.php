<?php

//Abrimos sesión para poder destruirla
session_start();
//Borramos el contenido de la sesión
session_unset();
//Eliminamos la sesión
session_destroy();
//Redirigimos al índice de php, que regula el control de sesiones
header('location: index.php');

?>