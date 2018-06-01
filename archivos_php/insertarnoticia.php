<?php
//Conexión a la base de datos
require("./conexion.php");
//Abrimos la sesión
session_start();
//Cogemos el título de la noticia
$titulo = $_POST['titulo_noticia'];
//Cogemos el contenido de la noticai
$contenido = $_POST['contenido_noticia'];
//Si se ha subido imagen, se coge
if(isset($_FILES['imagen_noticia'])){
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["imagen_noticia"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
   
        $check = getimagesize($_FILES["imagen_noticia"]["tmp_name"]);
        if($check !== false) {
            console.log("File is an image - " . $check["mime"] . ".");
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check if file already exists
if (file_exists($target_file)) {
    console.log("Sorry, file already exists.");
    $uploadOk = 0;
}
// Check file size
if ($_FILES["imagen_noticia"]["size"] > 500000) {
    console.log("Sorry, your file is too large.");
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    console.log("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    console.log("Sorry, your file was not uploaded.");
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["imagen_noticia"]["tmp_name"], $target_file)) {
        console.log("The file ". basename( $_FILES["imagen_noticia"]["name"]). " has been uploaded.");
    } else {
        console.log("Sorry, there was an error uploading your file.");
    }
}
    
$imagen = $_FILES["imagen_noticia"]["name"];

} else {
    $imagen = null;
}
//Cogemos el videojuego asociado
$videojuego = $_POST['videojuego_noticia'];
//Cogemos el admin
$admin = $_SESSION['id_admin'];
//Consulta para insertar la noticia
$sql = "INSERT INTO noticia (id_noticia,admin,titulo,contenido,imagen,videojuego) VALUES (null," . $admin . ",'" . $titulo . "','" . $contenido . "','" . $imagen . "','" . $videojuego . "')";
//Ejecutamos la consulta
$result = $conn->query($sql);
//Si ha ido bien
if($result){
    //redirigimos a la pantalla principal
    header("Location: ../home.html");
    //Si no ha ido bien
} else {
    //Mostramos un error
    echo mysqli_error($conn);
}

?>
