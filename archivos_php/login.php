<?php

require ("./conexion.php");

if (isset($_POST['radio']) && $_POST['radio'] == "Registrarse") {

    $user_name = $_POST['user_login'];
    $user_password = crypt($_POST['pass_login'], '$2y$10$fXJEsC0zWAR2tDrmlJgSaecbKyiEOK9GDCRKDReYM8gH2bG2mbO4e');
    $admin = 0;
    $sql = "INSERT INTO usuario (id_usuario, password, nombre_usuario, admin) VALUES (null,'" . $user_password . "','" . $user_name . "','" . $admin . "')";
    $result = $conn->query($sql);
    if ($result) {
        echo "Estupendioso";
        header("Location: ../index.html");
    } else {
        echo mysqli_error($conn);
    }
} else if (isset($_POST['radio']) && $_POST['radio'] == "Entrar") {
    $user_name = $_POST['user_login'];
    $user_password = crypt($_POST['pass_login'], '$2y$10$fXJEsC0zWAR2tDrmlJgSaecbKyiEOK9GDCRKDReYM8gH2bG2mbO4e');

    $sql = "SELECT password FROM usuario WHERE nombre_usuario = '" . $user_name . "'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    session_start();
    if ($user_password == $row['password']) {
        $_SESSION["user_name"] = $user_name;
        header("Location: ../noticias/csgo.php");
    } else {
        echo "nope";
        echo "<br/><br/>";
        echo $row['password'];
        echo "<br/><br/>";
        echo $user_password;
        header("Location: ../index.html");
    }
} else if (isset($_POST['radio']) && $_POST['radio'] == "Salir") {
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../index.html");
} else {
    header("Location: ../index.html");
}
?>