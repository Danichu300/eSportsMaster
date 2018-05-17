<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>PlayerUnkows BattleGrounds</title>
        <?php include("../archivos_php/cabezales.php"); ?>
        <link rel="shortcut icon" href="img/csgoicon.ico" />
        <link rel="stylesheet" href="../css/pubgcss.css"/>
    </head>
    <body>
        
        <?php include("../archivos_php/navegador.php"); ?>

        <div class="parallax">

            <div class="jumbotron">
                <h1 class="display-4">PlayerUnkows BattleGrounds</h1>
                <p class="lead">El mayor éxito en shooters.</p>
                <!--<hr class="my-4">
                <p>Últimas novedades.</p>
                <p class="lead">
                    <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
                </p>-->
            </div>

            <div id="wrapper">
                <section>
                    <!-- <div class="borde"> -->
                    <article id="partidos">
                        <h1>Próximos Partidos</h1>
                        <hr/>
                        <div class="contenido">
                            <!--  <nav> -->
                            <ul>
                                <?php
                                $sql = "SELECT * FROM partido WHERE fecha_inicio > NOW() AND videojuego = 'pubg'";
                                $result = $conn->query($sql);

                                while ($row = $result->fetch_assoc()) {
                                    echo "<li>" . $row["nombre_partido"] . "</li>";
                                }
                                ?>
                            </ul>
                            <!-- </nav> -->
                        </div>                   
                    </article>
                    <!--</div>-->
                    <!-- <div class="borde"> -->
                    <article id="torneos">
                        <h1>Próximos Torneos</h1>
                        <hr/>
                        <div class="contenido">
                            <!-- <nav> -->
                            <ul>
                                <?php
                                $sql = "SELECT nombre_torneo FROM torneo JOIN partido ON partido=id_partido WHERE fecha_inicio > NOW() AND videojuego = 'pubg'";
                                $result = $conn->query($sql);

                                while ($row = $result->fetch_assoc()) {
                                    echo "<li>" . $row["nombre_torneo"] . "</li>";
                                }
                                ?>
                            </ul>
                            <!-- </nav> -->
                        </div>
                    </article>
                    <!--</div>-->
                    <!-- <div class="borde"> -->
                    <article id="equipos">
                        <h1>Equipos destacados</h1>
                        <hr/>
                        <div class="contenido">
                            <!-- <nav> -->
                            <ul>
                                <?php
                                $sql = "SELECT * FROM equipo WHERE videojuego =" . 7;
                                $result = $conn->query($sql);

                                while ($row = $result->fetch_assoc()) {
                                    echo "<li>" . $row["nombre_equipo"] . "</li>";
                                }
                                ?>
                            </ul>
                            <!-- </nav> -->
                        </div>
                    </article>
                    <!-- </div> -->
                </section>

                <main>

                    <div class="informacion" id="descripcion">
                        <?php
                        $sql = "SELECT * FROM videojuego WHERE nombre_videojuego = 'PlayerUnknows BattleGrounds'";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();
                        echo "<h2>Videojuego: " . $row['nombre_videojuego'] . "</h2>";
                        ?>
                        <hr/>
                        <div class="izquierda-img">
                            <img src="../img/csgologo.jpg"/>
                            <p><?= $row['descripcion'] ?></p>
                        </div>
                    </div>

                    <div class="informacion" id="mecanicas">
                        <h3>Mecánicas de las partidas</h3>
                        <hr/>
                        <div class="derecha-img">
                            <img src="../img/csgologo.jpg"/>
                            <p><?= $row['mecanicas'] ?></p>
                        </div>
                    </div>

                    <div class="informacion" id="tacticas">
                        <h3>Tácticas</h3>
                        <hr/>
                        <div class="izquierda-img">
                            <img src="../img/csgologo.jpg"/>
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
                
                $sql = "SELECT * FROM noticia WHERE videojuego = 'pubg'";
                $result = $conn->query($sql);
                
                while($row = $result->fetch_array()){
                    echo "<div class='noticia'>";
                    echo "<h3>" . $row['titulo'] . "</h3>";
                    echo "<hr/>";
                    if($row['imagen']){
                        echo "<div id='contenedor_imagen'>";
                        echo "<img src='../img/" . $row['imagen'] . "' alt='imagen_noticia'/>";
                        echo "</div>";
                    }
                    echo "<p>" . $row['contenido'] . "</p>";
                    echo "</div>";
                }
                ?>

                <aside id="formularioComentarios">
                    <h1>Comentarios</h1>
                    <hr/>
                    <h3>Añade aquí tu comentario</h3>
                    <!-- action="../archivos_php/comentarios.php" -->
                    <form id="formComments" method="post" action="../archivos_php/comentarios.php">
                        <p>Introduce tu nombre de usuario</p>
                        <input id="usuario" name="user_comment" type="text" required/>
                        <p>Escribe lo que quieres compartir</p>
                        <textarea id="comentario" name="text_comment" required></textarea>
                        <input type="hidden" name="videojuego" value="pubg"/>
                        <p id="info"></p>
                        <input id="enviar_comentario" type="submit" value="Enviar comentario">
                    </form>
                </aside>

                <?php
                $sql = "SELECT * FROM comentario WHERE videojuego = 'pubg'";
                $result = $conn->query($sql);
           
                while($row = $result->fetch_array()){
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
        <?php include("../archivos_php/footer.php"); ?>
        <!--/.Footer-->
    </body>
</html>