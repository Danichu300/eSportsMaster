<?php
//Conexión para acceder a la base de datos
require("./conexion.php");
//Switch para saber qué se ha insertado
switch ($_POST['formulario']) {
    //Formulario de partidos
    case 'form1':
        //Cogemos la fecha de inicio
        $fecha_inicio = $_POST['fecha_inicio'];
        //Cogemos la fecha de fin
        $fecha_fin = $_POST['fecha_fin'];
        //Cogemos el videojuego
        $videojuego = $_POST['videojuego'];
        //Cogemos el nombre del partido
        $nombre_partido = $_POST['nombre_partido'];
        //Consulta para insertar partido
        $sql = "INSERT INTO partido (id_partido,fecha_inicio,fecha_fin,videojuego,nombre_partido) VALUES (null,'" . $fecha_inicio . "','" . $fecha_fin . "','" . $videojuego . "','" . $nombre_partido . "')";
        //Ejecutamos la consulta
        $result = $conn->query($sql);
        //Si ha ido bien
        if ($result) {
            //Redirigimos a la pantalla principal
            header("Location: ../home.html");
            //Si no
        } else {
            //Mostramos un error
            echo mysqli_error($conn);
        }
        break;
    //Formulario de torneos
    case 'form2':
        //Cogemos el nombre del torneo
        $nombre_torneo = $_POST['nombre_torneo'];
        //Cogemos el nombre del partido asociado
        $partido = $_POST['partido'];
        //Consulta para insertar el torneo
        $sql = "INSERT INTO torneo (id_torneo,nombre_torneo,partido) VALUES (null,'" . $nombre_torneo . "','" . $partido . "')";
        //Ejecutamos la consulta
        $result = $conn->query($sql);
        //Si ha ido bien
        if ($result) {
            //Redirigimos a la pantalla principal
            header("Location: ../home.html");
            //Si no ha ido bien
        } else {
            //Mostramos un mensaje de error
            echo mysqli_error($conn);
        }
        break;
    //Formulario de insertar equipo    
    case 'form3':
        //Cogemos el nombre del equipo
        $nombre_equipo = $_POST['nombre_equipo'];
        //Si se ha subido el logo, se coge
        if (isset($_POST['logo']))
            $logo = $_POST['logo'];
        else
            $logo = null;
        //Cogemos el videojuego
        $videojuego = $_POST['videojuego'];
        //Consulta para insertar equipo
        $sql = "INSERT INTO equipo (id_equipo,nombre_equipo,logo,videojuego) VALUES (null,'" . $nombre_equipo . "','" . $logo . "','" . $videojuego . "')";
        //Ejecutamos la consulta
        $result = $conn->query($sql);
        //Si ha ido bien
        if ($result) {
            //Redirigimos a la pantalla principal
            header("Location: ../home.html");
            //Si no ha ido bien
        } else {
            //Mostramos mensaje de error
            echo mysqli_error($conn);
        }
        break;
        //Por defecto, redirige a la pantalla principal
    default:
        header("Location: ../home.html");
}
?>