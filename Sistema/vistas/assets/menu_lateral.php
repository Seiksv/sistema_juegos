<nav class="main-menu">
    <div>
        <ul>
            <li>
                <a href="" class="link_header">
                    <i class="fa fa-user fa-lg"></i>
                    <span class="nav-text">Bienvenido <?= $userSession->getCurrentUser(); ?></span>
                </a>
            </li>
        </ul>
    </div>
    <div class="settings"></div>
    <div class="scrollbar" id="style-1">
        <ul>
            <li>
                <a href="home.php">
                    <i class="fa fa-home fa-lg"></i>
                    <span class="nav-text">Inicio</span>
                </a>
            </li>
            <li>
                <a href="">
                    <i class="fa fa-user fa-lg"></i>
                    <span class="nav-text">Mi Perfil</span>
                </a>
            </li>
            <li>
                <a href="puntajes.php">
                    <i class="fa fa-envelope-o fa-lg"></i>
                    <span class="nav-text">Mis Puntajes</span>
                </a>
            </li>
            <li class="">
                <a href="ejercicios.php">
                    <i class="fa fa-gamepad fa-lg"></i>
                    <span class="nav-text">Ejercicios</span>
                </a>
            </li>
          
        </ul>
        <li>
            <a href="">
                <i class="fa fa-question-circle fa-lg"></i>
                <span class="nav-text">Ayuda</span>
            </a>
        </li>
        <ul class="logout">
            <li>
                <a href="includes/logout.php">
                    <i class="fa fa-lightbulb-o fa-lg"></i>
                    <span class="nav-text">
                        Cerrar sesión
                    </span>
                </a>
            </li>
        </ul>
        <ul class="logout">
            <li>
                <i class="fa fa-lightbulb-o fa-lg"></i>
            </li>
        </ul>
</nav>