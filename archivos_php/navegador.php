<!-- Navegador común -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <!-- Navbar content -->
            <a class="navbar-brand" href="#">No te lo pierdas</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="../home.html">Portada<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="entrar" class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin</a>
                        <div class="dropdown-menu" aria-labelledby="entrar">
                            <form method="post" action="../archivos_php/admin.php" class="dropdown-menu p-4" id="menu_admin">
                                <div class="form-group">
                                    <label for="id">ID</label>
                                    <input type="number" id="id" class="form-control" name="id_admin" placeholder="NNNNN">
                                </div>
                                <div class="form-group">
                                    <label for="pass">Contraseña</label>
                                    <input type="password" id="pass" class="form-control" name="pass_admin" placeholder="*****">
                                </div>
                                <button type="submit" id="enviar_admin" class="btn btn-primary">Sign in</button>
                            </form>
                        </div>
                    </li>
                    <?php
                    session_start();
                    if (isset($_SESSION['nombre_usuario'])) {
                        echo "<li class='nav-item dropdown'>";
                        echo "<a class='nav-link' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> Hola, " . $_SESSION['nombre_usuario'] . "</a>";
                        echo "</li>";
                    } else {
                        echo "<li class='nav-item dropdown'>";
                        echo "<a class='nav-link' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> Debes Iniciar Sesión </a>";
                        echo "</li>";
                    }
                    ?>
                    <li class="nav-item dropdown">
                            <div ALIGN=center>
                                <input type="button" onClick="loggout()" name="cerrar_sesion" value="Logout">
                            </div>
                    </li>
                </ul>
            </div>
        </nav>
<script>
    function loggout(){
        localStorage.setItem('logged','false');
        window.location = '../controlador_logout.php'
    }
</script>