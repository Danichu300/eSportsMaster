<!DOCTYPE html>
<html lang="en">
<head>
  <title>Formulario Acceso</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Inicie Sesión para acceder al contenido web</h2>
  <form action="controlador_login.php" method="post">
    <div class="form-group">
      <label for="usuario">Usuario:</label>
      <input type="text" class="form-control" id="usuario" placeholder="Usuario" name="usuario">
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Entrar</button>
    <button class="btn btn-primary" id="registro">Registro</button>
  </form>
</div>
    <script>
       
        let btnregistro = document.querySelector('#registro');
        
        btnregistro.addEventListener('click',(event) => {
           
            event.preventDefault();
            let usuario = document.querySelector('#usuario').value;
            let password = btoa(document.querySelector('#password').value);
            
            let xhr = new XMLHttpRequest();
                      
            xhr.open('POST','http://localhost/pruebas/eSportsReview/controlador_registro.php');
            
            xhr.send(`usuario=${usuario}&password=${password}`);
            //fetch('http://localhost/pruebas/eSportsReview/controlador_registro.php', {method: 'post',body: `usuario=${document.querySelector('#usuario').value}&password=${btoa(document.querySelector('#password').value)}`})
            });
        
    </script>
</body>
</html>
