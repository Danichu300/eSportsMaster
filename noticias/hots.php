<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Heroes of the Storm</title>
        <!-- Incluimos los cabezales comunes entre todas las noticias -->
        <?php include("../archivos_php/cabezales.php"); ?>
        <link rel="shortcut icon" href="img/csgoicon.ico" />
        <link rel="stylesheet" href="../css/hotscss.css"/>
    </head>
    <body>
        
        <!-- Incluimos el navegador, ya que es común entre las noticias -->

        <?php include("../archivos_php/navegador.php"); ?>
        
        <!-- Contenedor del parallax del fondo -->

        <div class="parallax">
            
            <!-- Jumbotrón con el título y eslogan del videojuego -->

            <div class="jumbotron">
                <h1 class="display-4">Heroes of the Storm</h1>
                <p class="lead">Tres líneas, valientes héroes y un nexo.</p>
            </div>
            
            <!-- Contenedor principal -->

            <div id="wrapper">
                <!-- Sección que contiene los próximos partidos y torneos y equipos destacados -->
                <section>
                    <!-- Artículo que contiene los próximos partidos -->
                    <article id="partidos">
                        <h1>Próximos Partidos</h1>
                        <hr/>
                        <div class="contenido">
                            <ul>
                                <?php
                                $sql = "SELECT * FROM partido WHERE fecha_inicio > NOW() AND videojuego = 'hots'";
                                $result = $conn->query($sql);

                                while ($row = $result->fetch_assoc()) {
                                    echo "<li>" . $row["nombre_partido"] . "</li>";
                                }
                                ?>
                            </ul>
                        </div>                   
                    </article>
                    <!-- Artículo que contiene los próximos torneos -->
                    <article id="torneos">
                        <h1>Próximos Torneos</h1>
                        <hr/>
                        <div class="contenido">
                            <ul>
                                <?php
                                $sql = "SELECT nombre_torneo FROM torneo JOIN partido ON partido=id_partido WHERE fecha_inicio > NOW() AND videojuego = 'hots'";
                                $result = $conn->query($sql);

                                while ($row = $result->fetch_assoc()) {
                                    echo "<li>" . $row["nombre_torneo"] . "</li>";
                                }
                                ?>
                            </ul>
                        </div>
                    </article>
                    <!-- Artículo que contiene los equipos -->
                    <article id="equipos">
                        <h1>Equipos</h1>
                        <hr/>
                        <div class="contenido">
                            <ul>
                                <?php
                                $sql = "SELECT * FROM equipo WHERE videojuego =" . 4;
                                $result = $conn->query($sql);

                                while ($row = $result->fetch_assoc()) {
                                    echo "<li>" . $row["nombre_equipo"] . "</li>";
                                }
                                ?>
                            </ul>
                        </div>
                    </article>
                </section>
                <!-- Sección principal de la página -->
                <main>
                    <!-- Descripción del videojuego -->
                    <div class="informacion" id="descripcion">
                        <?php
                        $sql = "SELECT * FROM videojuego WHERE nombre_videojuego = 'Heroes of the Storm'";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();
                        echo "<h2>Videojuego: " . $row['nombre_videojuego'] . "</h2>";
                        ?>
                        <hr/>
                        <div class="izquierda-img">
                            <img src="../img/hots1.jpg"/>
                            <p><?= $row['descripcion'] ?></p>
                        </div>
                    </div>
                    <!-- Mecánicas del videojuego -->
                    <div class="informacion" id="mecanicas">
                        <h3>Mecánicas de las partidas</h3>
                        <hr/>
                        <div class="derecha-img">
                            <img src="../img/hots2.jpg"/>
                            <p><?= $row['mecanicas'] ?></p>
                        </div>
                    </div>
                    <!-- Tácticas del videojuego -->
                    <div class="informacion" id="tacticas">
                        <h3>Tácticas</h3>
                        <hr/>
                        <div class="izquierda-img">
                            <img src="../img/hots3.jpg"/>
                            <ul>
                                <?php
                                $texto = $row['tacticas'];
                                $lista = explode("- ", $texto);
                                foreach ($lista as $li) {
                                    if ($li != "")
                                        echo "<li>" . $li . "</li>";
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </main>

                <?php
                //Consulta para mostrar todas las noticias relacionadas con este videojuego
                $sql = "SELECT * FROM noticia WHERE videojuego = 'hots'";
                $result = $conn->query($sql);
                //Con cada noticia, montamos al estructura de la noticia
                while ($row = $result->fetch_array()) {
                    echo "<div class='noticia'>";
                    echo "<h3>" . $row['titulo'] . "</h3>";
                    echo "<hr/>";
                    if ($row['imagen']) {
                        echo "<div id='contenedor_imagen'>";
                        echo "<img src='../archivos_php/uploads/" . $row['imagen'] . "' alt='imagen_noticia'/>";
                        echo "</div>";
                    }
                    echo "<p>" . $row['contenido'] . "</p>";
                    echo "</div>";
                }
                ?>
                <!-- Formulario de los comentarios -->
                <aside id="formularioComentarios">
                    <h1>Comentarios</h1>
                    <hr/>
                    <h3>Añade aquí tu comentario</h3>
                    <form id="formComments" method="post" action="../archivos_php/comentarios.php">
                        <p>Introduce tu nombre de usuario</p>
                        <input id="usuario" name="user_comment" type="text" value=<?= $_SESSION['nombre_usuario'] ?> readonly/>
                        <p>Escribe lo que quieres compartir</p>
                        <textarea id="comentario" name="text_comment" required></textarea>
                        <input type="hidden" name="videojuego" value="hots"/>
                        <p id="info"></p>
                        <input id="enviar_comentario" type="submit" value="Enviar comentario">
                    </form>
                </aside>

                <?php
                //Consulta para mostrar todos los comentarios sobre este videojuego
                $sql = "SELECT * FROM comentario WHERE videojuego = 'hots'";
                $result = $conn->query($sql);
                //Con cada comentario, montamos la estructura del comentario
                while ($row = $result->fetch_array()) {
                    $buscarUsuario = "SELECT nombre_usuario FROM usuario WHERE id_usuario = " . $row['usuario'] . "";
                    $resultado = $conn->query($buscarUsuario);
                    $usuario = $resultado->fetch_assoc();
                    echo "<aside>";
                    echo "<h2>" . $usuario['nombre_usuario'] . "</h2>";
                    echo "<hr/>";
                    echo "<h4>" . $row['fecha_comentario'] . "</h4>";
                    echo "<p>" . $row['contenido'] . "</p>";
                    echo "</aside>";
                }
                ?>
            </div>
        </div>
        <!--Footer-->
        <!-- Incluimos el footer, común en todas las páginas -->
        <?php include("../archivos_php/footer.php"); ?>
        <!--/.Footer-->
        <?php include("../archivos_php/localstorage.php"); ?>
    </body>
</html>
