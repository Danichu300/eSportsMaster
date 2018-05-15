<?php

require("./conexion.php");

switch ($_POST['formulario']) {

    case 'form1':

        $fecha_inicio = $_POST['fecha_inicio'];
        $fecha_fin = $_POST['fecha_fin'];
        $videojuego = $_POST['videojuego'];
        $nombre_partido = $_POST['nombre_partido'];

        $sql = "INSERT INTO partido (id_partido,fecha_inicio,fecha_fin,videojuego,nombre_partido) VALUES (null,'" . $fecha_inicio . "','" . $fecha_fin . "','" . $videojuego . "','" . $nombre_partido . "')";

        $result = $conn->query($sql);

        if ($result) {
            header("Location: ../index.html");
        } else {
            echo mysqli_error($conn);
        }
        break;

    case 'form2':

        $nombre_torneo = $_POST['nombre_torneo'];
        $partido = $_POST['partido'];

        $sql = "INSERT INTO torneo (id_torneo,nombre_torneo,partido) VALUES (null,'" . $nombre_torneo . "','" . $partido . "')";

        $result = $conn->query($sql);

        if ($result) {
            header("Location: ../index.html");
        } else {
            echo mysqli_error($conn);
        }
        break;

    case 'form3':

        $nombre_equipo = $_POST['nombre_equipo'];
        if (isset($_POST['logo']))
            $logo = $_POST['logo'];
        else
            $logo = null;
        $videojuego = $_POST['videojuego'];

        $sql = "INSERT INTO equipo (id_equipo,nombre_equipo,logo,videojuego) VALUES (null,'" . $nombre_equipo . "','" . $logo . "','" . $videojuego . "')";

        $result = $conn->query($sql);

        if ($result) {
            header("Location: ../index.html");
        } else {
            echo mysqli_error($conn);
        }
        break;
    default:
        header("Location: ../index.html");
}
?>