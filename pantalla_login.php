<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Formulario Acceso</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/login.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <!-- Contenedor del parallax del fondo -->
        <div class="parallax">
            <!-- Div contenedor principal -->
            <div class="container">
                <!-- Título de la web que cambia con una función -->
                <h2 id="title">Inicie Sesión para acceder al contenido web</h2>
                <!-- Formulario de login con usuario, contraseña y botones de entrar, registrarse y limpiar campos -->
                <form action="controlador_login.php" method="post">
                    <div class="form-group">
                        <label for="usuario">Usuario:</label>
                        <input type="text" class="form-control" id="usuario" placeholder="Usuario" name="usuario" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
                    </div>
                    <button id="entrar" class="btn btn-primary">Entrar</button>
                    <button class="btn btn-primary" id="registro">Registro</button>
                    <button class="btn btn-primary" id="reset">Limpiar campos</button>
                </form>
            </div>
        </div>
        <script>
            //Cogemos las variables globales del script
            let btnregistro = document.querySelector('#registro');
            let btnentrar = document.querySelector('#entrar');
            let btnreset = document.querySelector('#reset');

            let user = document.querySelector('#usuario');
            let pass = document.querySelector('#password');
            let title = document.querySelector('#title');
            
           // Añadimos la funcionalidad al botón de registro
            
            btnregistro.addEventListener('click', (event) => {
                //Detenemos el envío del formulario para poder hacer la petición
                event.preventDefault();
                //Hacemos saltar un error de credenciales si los campos están vacíos, en caso de que falle el required
               // saltoError();
                //Enviamos la petición al controlador correspondiente
                enviarPeticion('./controlador_registro.php');
                //fetch('http://localhost/eSportsMaster/controlador_registro.php', {method: 'post',body: `usuario=${document.querySelector('#usuario').value}&password=${btoa(document.querySelector('#password').value)}`})
            });
            
            // Añadimos la funcionalidad al botón de entrar

            btnentrar.addEventListener('click', (event) => {
                //Detenemos el envío del formulario para poder hacer la petición
                event.preventDefault();
                //Hacemos saltar un error de credenciales si los campos están vacíos, en caso de que falle el required
               // saltoError();
                //Enviamos la petición al controlador correspondiente
                enviarPeticion('./controlador_login.php');
                //fetch('http://localhost/eSportsMaster/controlador_login.php', {method: 'post',body: `usuario=${document.querySelector('#usuario').value}&password=${btoa(document.querySelector('#password').value)}`})
            });
            
            // Añadimos la funcionalidad al botón de limpiar campos
            
            btnreset.addEventListener('click', (event)=>{
                //Detenemos el envío del formulario para evitar hacer la petición
                event.preventDefault();
                //Volvemos a poner el título original
                title.innerHTML = 'Inicie Sesión para acceder al contenido web';
                //Seteamos el valor del usuario a blanco
                user.value = '';
                //Seteamos el valor de la contraseña a blanco
                pass.value = '';
            });
            
            /**
             * Función para enviar la petición vía post al controlador correspondiente a través del parámetro
             * @param {type} url
             * @return {undefined}
             */
            
            function enviarPeticion(url){
                //Cogemos el valor del usuario introducido
                let usuario = user.value;
                //Cogemos el valor de la contraseña introducida y la encriptamos con base 64
                let password = btoa(pass.value);
                
                //Creamos la petición

                let xhr = new XMLHttpRequest();

                xhr.onreadystatechange = function (aEvt) {
                    //Si la petición ha ido bien
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        //Redirigimos a la página principal
                        localStorage.setItem('logged','true');
                        window.location = "home.html";
                        //Si la petición ha ido mal
                    } else if (xhr.readyState === 4 && xhr.status === 404) {
                        //No hacemos redirección y avisamos al usuario
                        title.innerHTML = "Fallo de Credenciales. Sigue probando.";
                    }
                };
                //Abrimos la petición con método post, el controlador correspondiente y true porque la petición es asíncrona
                xhr.open("POST", url, true);
                //Establecemos el cabezal correspondiente del content type para evitar fallos de envío
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                //Enviamos la petición
                xhr.send('usuario=' + usuario + '&password=' + password);
            }
            
            /**
             * Función para reforzar la obligación del usuario a introducir las credenciales
             * @return {undefined}
             */
            
           /* function saltoError(event){
                if(user == "" || pass = ""){
                    event.preventDefault();
                    title.innerHTML = "No puedes dejar campos vacíos";
                }
            }*/

        </script>
    </body>
</html>
