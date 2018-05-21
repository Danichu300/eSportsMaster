<html>
    <head>
        <style>
            body{
                /* The image used */
                background: "img/arena_esports.jpg";
            }
        </style>
        <script>
            let boton = document.getElementById("boton");
            boton.addEventListener('click', ()=> {
               window.location = 'pantalla_location.php';
            });
        </script>
    </head>
    <body>
        <h1>Fallo de conexión, por favor, vuelva a intentarlo más tarde</h1>
        <button onclick="window.location = 'index.php'">Regresar</button>
    </body>
</html>