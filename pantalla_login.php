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
        <div class="parallax">
            <div class="container">
                <h2 id="title">Inicie Sesión para acceder al contenido web</h2>
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

            let btnregistro = document.querySelector('#registro');
            let btnentrar = document.querySelector('#entrar');
            let btnreset = document.querySelector('#reset');

            let user = document.querySelector('#usuario');
            let pass = document.querySelector('#password');
            let title = document.querySelector('#title');
            
            btnregistro.addEventListener('click', (event) => {

                event.preventDefault();
                enviarPeticion('./controlador_registro.php');
                //fetch('http://localhost/pruebas/eSportsReview/controlador_registro.php', {method: 'post',body: `usuario=${document.querySelector('#usuario').value}&password=${btoa(document.querySelector('#password').value)}`})
            });

            btnentrar.addEventListener('click', (event) => {
                event.preventDefault();
                enviarPeticion('./controlador_login.php');
                //fetch('http://localhost/pruebas/eSportsReview/controlador_login.php', {method: 'post',body: `usuario=${document.querySelector('#usuario').value}&password=${btoa(document.querySelector('#password').value)}`})
            });
            
            btnreset.addEventListener('click', (event)=>{
                event.preventDefault();
                title.innerHTML = 'Inicie Sesión para acceder al contenido web';
                user.value = '';
                pass.value = '';
            });
            
            function enviarPeticion(url){
                let usuario = user.value;
                let password = btoa(pass.value);
                

                let xhr = new XMLHttpRequest();

                xhr.onreadystatechange = function (aEvt) {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        console.log('Location:', window.location);
                        window.location = "home.html";
                    } else if (xhr.readyState === 4 && xhr.status === 404) {
                        title.innerHTML = "Fallo de Credenciales. Sigue probando.";
                    }
                };
                xhr.open("POST", url, true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.send('usuario=' + usuario + '&password=' + password);
            }

        </script>
    </body>
</html>
