<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Heroes of the Storm</title>
        <?php include("../archivos_php/cabezales.php"); ?>
        <link rel="shortcut icon" href="img/csgoicon.ico" />
        <link rel="stylesheet" href="../css/hotscss.css"/>
    </head>
    <body>

        <?php include("../archivos_php/navegador.php"); ?>

        <div class="parallax">

            <div class="jumbotron">
                <h1 class="display-4">Heroes of the Storm</h1>
                <p class="lead">Tres líneas, valientes héroes y un nexo.</p>
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
                                $sql = "SELECT * FROM partido WHERE fecha_inicio > NOW() AND videojuego = 'hots'";
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
                                $sql = "SELECT nombre_torneo FROM torneo JOIN partido ON partido=id_partido WHERE fecha_inicio > NOW() AND videojuego = 'hots'";
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
                                $sql = "SELECT * FROM equipo WHERE videojuego =" . 4;
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
                        $sql = "SELECT * FROM videojuego WHERE nombre_videojuego = 'Heroes of the Storm'";
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
                $sql = "SELECT * FROM noticia WHERE videojuego = 'hots'";
                $result = $conn->query($sql);

                while ($row = $result->fetch_array()) {
                    echo "<div class='noticia'>";
                    echo "<h3>" . $row['titulo'] . "</h3>";
                    echo "<hr/>";
                    if ($row['imagen']) {
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
                        <input type="hidden" name="videojuego" value="hots"/>
                        <p id="info"></p>
                        <input id="enviar_comentario" type="submit" value="Enviar comentario">
                    </form>
                </aside>

                <?php
                $sql = "SELECT * FROM comentario WHERE videojuego = 'hots'";
                $result = $conn->query($sql);

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
        <footer class="page-footer font-small unique-color-dark pt-0">

            <div style="background-color: #3E4551;">
                <div class="container">
                    <!--Grid row-->
                    <div class="row py-4 d-flex align-items-center">

                        <!--Grid column-->
                        <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
                            <h6 class="mb-0 white-text">¡Comparte en tus redes sociales!</h6>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-md-6 col-lg-7 text-center text-md-right">
                            <!--Facebook-->
                            <a class="fb-ic ml-0" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A//rawgit.com/Danichu300/eSportsReview/Descargar/index.html">
                                <i class="fa fa-facebook white-text mr-lg-4"> </i>
                            </a>
                            <!--Twitter-->
                            <a class="tw-ic" target="_blank" href="https://twitter.com/home?status=https%3A//rawgit.com/Danichu300/eSportsReview/Descargar/index.html">
                                <i class="fa fa-twitter white-text mr-lg-4"> </i>
                            </a>
                            <!--Google +-->
                            <a class="gplus-ic" target="_blank" href="https://plus.google.com/share?url=https%3A//rawgit.com/Danichu300/eSportsReview/Descargar/index.html">
                                <i class="fa fa-google-plus white-text mr-lg-4"> </i>
                            </a>
                            <!--Linkedin-->
                            <a class="li-ic" target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=https%3A//rawgit.com/Danichu300/eSportsReview/Descargar/index.html&title=&summary=&source=">
                                <i class="fa fa-linkedin white-text mr-lg-4"> </i>
                            </a>
                            <!--Email-->
                            <a class="ins-ic" target="_blank" href="mailto:Awesome eSports Page!!!?&body=https%3A//rawgit.com/Danichu300/eSportsReview/Descargar/index.html">
                                <i class="fa fa-envelope white-text mr-lg-4"> </i>
                            </a>
                        </div>
                        <!--Grid column-->

                    </div>
                    <!--Grid row-->
                </div>
            </div>

            <!--Footer Links-->
            <div class="container mt-5 mb-4 text-center text-md-left">
                <div class="row mt-3">

                    <!--First column-->
                    <div class="col-md-3 col-lg-4 col-xl-3 mb-4">
                        <h6 class="text-uppercase font-weight-bold">
                            <strong>Novedades</strong>
                        </h6>
                        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                        <p>Conoce cada detalle sobre los jugadores, torneos, partidos, regiones y equipos que más te gusten.</p>
                    </div>
                    <!--/.First column-->

                    <!--Second column-->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <h6 class="text-uppercase font-weight-bold">
                            <strong>Próximamente</strong>
                        </h6>
                        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                        <p>
                            <a href="#partidos">Próximos partidos</a>
                        </p>
                        <p>
                            <a href="#torneos">Torneos cercanos</a>
                        </p>
                        <p>
                            <a href="#equipos">Equipos destacados</a>
                        </p>
                    </div>
                    <!--/.Second column-->

                    <!--Third column-->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <h6 class="text-uppercase font-weight-bold">
                            <strong>Aprende sus tácticas</strong>
                        </h6>
                        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                        <p>
                            <a href="#descripcion">Descripciones de videojuegos</a>
                        </p>
                        <p>
                            <a href="#mecanicas">Mecánicas</a>
                        </p>
                        <p>
                            <a href="#tacticas">Tácticas</a>
                        </p>
                    </div>
                    <!--/.Third column-->

                    <!--Fourth column-->
                    <div class="col-md-4 col-lg-3 col-xl-3" id="mensajes">
                        <h6 class="text-uppercase font-weight-bold">
                            <strong>Contacta con nosotros</strong>
                        </h6>
                        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                        <p class="correo">
                            <i class="fa fa-envelope mr-3"></i> danikillersx@gmail.com</p>
                        <p class="correo">
                            <i class="fa fa-envelope mr-3"></i> onesoco138@gmail.com</p>
                        <p class="correo">
                            <i class="fa fa-envelope mr-3"></i> justcyclo@gmail.com</p>

                        <form id="email" action="../archivos_php/email.php" method="POST" style="display:none;">
                            <b>Por favor, selecciona el administrador con el que quieres contactar</b><br>
                            <select name="admins">
                                <option>danikillersx@gmail.com</option>
                                <option>onesoco138@gmail.com</option>
                                <option>justcyclo@gmail.com</option>
                            </select>
                            <p><b>Subject</b><br>
                                <input type="text" name="subject" size=40 required>
                            <p><b>Message</b><br>
                                <textarea cols=40 rows=10 name="message" required></textarea>
                            <p><input type="submit" value=" Send ">
                        </form>
                    </div>
                    <!--/.Fourth column-->

                </div>
            </div>
            <!--/.Footer Links-->

            <!-- Copyright-->
            <div class="footer-copyright py-3 text-center">
                © 2018 Copyright: Daniel Rodríguez Cardell - Antonio García Llabrés - Julián Maestre Cabrera
            </div>
            <!--/.Copyright -->

        </footer>
        <!--/.Footer-->
    </body>
</html>