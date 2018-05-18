<!DOCTYPE html>
<html>
    <head>
        <title>Creador de noticias</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../css/newsstyle.css">
        <link rel="stylesheet" type="text/css" href="../css/crearnoticia.css"/>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="../archivos_js/crearnoticias.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Creación de noticias</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="../home.html">Portada<span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
        </nav>
        
        <!-- Contenedor del parallax del fondo -->

        <div class="parallax">
            
            <!-- Jumbotrón con el título y eslogan de la zona admin -->
            
            <div class="jumbotron">
                <h1 class="display-4">Creador de noticias</h1>
                <p class="lead">Espacio de admin.</p>
            </div>
            
            <!-- Contenedor principal -->
            
            <div id="wrapper">
                <!-- Sección principal -->
                <section>
                    <!-- Insertar partidos -->
                    <article class="bg-dark" id="partidos">
                        <h1>Próximos Partidos</h1>
                        <hr/>
                        <img id="img1" class="plus" src="../img/plus.png" alt="plus"/>
                        <form class="formularioInsert" method="post" action="./insertarpartido.php" style="display:none;">
                            <p>Fecha inicio</p>
                            <input type="date" name="fecha_inicio"/>
                            <p>Fecha fin</p>
                            <input type="date" name="fecha_fin"/>
                            <p>Videojuego</p>
                            <select name="videojuego">
                                <option value="csgo">Counter Strike Global Offensive</option>
                                <option value="overwatch">Overwatch</option>
                                <option value="hots">Heroes of the Storm</option>
                                <option value="lol">League of Legends</option>
                                <option value="pubg">PlayerUnknows BattleGrounds</option>
                                <option value="rocket">Rocket League</option>
                                <option value="dota">DOTA 2</option>
                            </select>
                            <p>Nombre del partido</p>
                            <input type="text" name="nombre_partido"/>
                            <input type="hidden" name="formulario" value="form1"/>
                            <input type="submit" value="Insertar Partido"/>
                        </form>
                    </article>
                    <!-- Insertar torneos -->
                    <article class="bg-dark" id="torneos">
                        <h1>Próximos Torneos</h1>
                        <hr/>
                        <img id="img2" class="plus" src="../img/plus.png" alt="plus"/>
                        <form class="formularioInsert" method="post" action="./insertarpartido.php" style="display:none;">
                            <p>Nombre del torneo</p>
                            <input type="text" name="nombre_torneo"/>
                            <p>Partido asociado</p>
                            <select name="partido">
                                <?php
                                require("./conexion.php");
                                //Mostramos los partidos que hay
                                $sql = "SELECT * FROM partido";

                                $result = $conn->query($sql);

                                while ($row = $result->fetch_assoc()) {
                                    if($row['nombre_partido'] != "")
                                    echo "<option value='" . $row['id_partido'] . "'>" . $row['nombre_partido'] . "</option>";
                                }
                                ?>
                            </select>
                            <input type="hidden" name="formulario" value="form2"/>
                            <input type="submit" value="Insertar Torneo"/>
                        </form>
                    </article>
                    <!-- Insertar equipos -->
                    <article class="bg-dark" id="equipos">
                        <h1>Equipos</h1>
                        <hr/>
                        <img id="img3" class="plus" src="../img/plus.png" alt="plus"/>
                        <form class="formularioInsert" method="post" action="./insertarpartido.php" style="display:none;">
                            <p>Nombre del equipo</p>
                            <input type="text" name="nombre_equipo"/>
                            <p>Logo del equipo</p>
                            <input type="file" name="logo"/>
                            <p>Videojuego asociado</p>
                            <select name="videojuego">
                                <?php
                                require("./conexion.php");
                                //Mostramos los videojuegos que hay
                                $sql = "SELECT * FROM videojuego";

                                $result = $conn->query($sql);

                                while ($row = $result->fetch_assoc()) {
                                    if($row['nombre_videojuego'] != "")
                                    echo "<option value='" . $row['id_videojuego'] . "'>" . $row['nombre_videojuego'] . "</option>";
                                }
                                ?>
                            </select>
                            <input type="hidden" name="formulario" value="form3"/>
                            <input type="submit" value="Insertar Equipo"/>
                        </form>
                    </article>
                </section>
                <!-- Contenedo principal -->
                <main>
                    <!-- Formulario para insertar noticias -->
                    <div id="divFormularioNoticia" class="bg-dark container-fluid">
                        <form id="formularioNoticia" method="post" action="./insertarnoticia.php">
                            <h3>Título de la noticia</h3>
                            <input class="form-control" type="text" name="titulo_noticia"/>
                            <h3>Descripción de la noticia</h3>
                            <textarea class="form-control" name="contenido_noticia"></textarea>
                            <h3>Adjuntar imagen...</h3>
                            <input type="file" name="imagen_noticia"/>
                            <h3>Videojuego asociado</h3>
                            <select class="form-control" name="videojuego_noticia">
                                <option value="csgo">Counter Strike Global Offensive</option>
                                <option value="overwatch">Overwatch</option>
                                <option value="hots">Heroes Of The Storm</option>
                                <option value="lol">League of Legends</option>
                                <option value="pubg">PlayerUnknown's BatteGrounds</option>
                                <option value="rocket">Rocket League</option>
                                <option value="dota">Dota 2</option>
                            </select>
                            <input type="submit" value="Generar Noticia"/>
                        </form>
                    </div>
                </main>
            </div>
        </div>
    </body>
</html>