<!DOCTYPE html>
<html class="menu">
<html>

<head>

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content=="IE=edge" />
    <meta name="google" value="notranslate" />
    <title>Side Menu</title>

    <!-- Bootstrap CSS -->
<link rel="stylesheet" href="./rsc/css/bootstrap.min.css" />

<link href="./rsc/css/all.css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="./rsc/css/tema_principal.css">
    <link rel="stylesheet" type="text/css" href="./rsc/css/style.css">

    <link rel="stylesheet" type="text/css"
        href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">

</head>
<body>
    </div>
    <nav class="main-menu">
        <div>
            <p>Juegos   
            </p>
        </div>
        <div class="settings"></div>
        <div class="scrollbar" id="style-1">
            <ul>
                <li>
                    <a href="http://startific.com">
                        <i class="fa fa-home fa-lg"></i>
                        <span class="nav-text">Inicio</span>
                    </a>
                </li>

                <li>
                    <a href="http://startific.com">
                        <i class="fa fa-user fa-lg"></i>
                        <span class="nav-text">Mi perfil</span>
                    </a>
                </li>
                <li>
                    <a href="http://startific.com">
                        <i class="fa fa-envelope-o fa-lg"></i>
                        <span class="nav-text">Contact</span>
                    </a>
                </li>                
                <li class="darkerlishadow">
                    <a href="http://startific.com">
                        <i class="fa fa-clock-o fa-lg"></i>
                        <span class="nav-text">News</span>
                    </a>
                </li>

                <li class="darkerli">
                    <a href="http://startific.com">
                        <i class="fa fa-desktop fa-lg"></i>
                        <span class="nav-text">Technology</span>
                    </a>
                </li>

                <li class="darkerli">
                    <a href="http://startific.com">
                        <i class="fa fa-plane fa-lg"></i>
                        <span class="nav-text">Travel</span>
                    </a>
                </li>

                <li class="darkerli">
                    <a href="http://startific.com">
                        <i class="fa fa-shopping-cart"></i>
                        <span class="nav-text">Shopping</span>
                    </a>
                </li>

                <li class="darkerli">
                    <a href="http://startific.com">
                        <i class="fa fa-microphone fa-lg"></i>
                        <span class="nav-text">Film & Music</span>
                    </a>
                </li>

                <li class="darkerli">
                    <a href="http://startific.com">
                        <i class="fa fa-flask fa-lg"></i>
                        <span class="nav-text">Web Tools</span>
                    </a>
                </li>

                <li class="darkerli">
                    <a href="http://startific.com">
                        <i class="fa fa-picture-o fa-lg"></i>
                        <span class="nav-text">Art & Design</span>
                    </a>
                </li>

                <li class="darkerli">
                    <a href="http://startific.com">
                        <i class="fa fa-align-left fa-lg"></i>
                        <span class="nav-text">Magazines
                        </span>
                    </a>
                </li>

                <li class="darkerli">
                    <a href="http://startific.com">
                        <i class="fa fa-gamepad fa-lg"></i>
                        <span class="nav-text">Games</span>
                    </a>
                </li>

                <li class="darkerli">
                    <a href="http://startific.com">
                        <i class="fa fa-glass fa-lg"></i>
                        <span class="nav-text">Life & Style
                        </span>
                    </a>
                </li>

                <li class="darkerlishadowdown">
                    <a href="http://startific.com">
                        <i class="fa fa-rocket fa-lg"></i>
                        <span class="nav-text">Fun</span>
                    </a>
                </li>
            </ul>
            <li>
                <a href="http://startific.com">
                    <i class="fa fa-question-circle fa-lg"></i>
                    <span class="nav-text">Help</span>
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
    </nav>
    <div class="cuerpo">
        <div class="content">
            <div class="text-center">
                <h1 class="display-3">Sistema de Juegos Didacticos </h1>
                <section>
                    <h1>Bienvenido <?php echo $user->getNombre();  ?></h1>    
                </section>
            </div>
        </div>
        <div class="flexing">
            <div class="section section--yellow">
                <h3 class="title text-center">Ejercicio 1</h3>
            </div>
            <div class="section section--pink">
                <h3 class="title text-center">Ejericicio 2</h3>
            </div>
            <div class="section section--green">
                <h3 class="title text-center">Ejercicio 3</h3>
            </div>
        </div>
    </div>

     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="./rsc/js/jquery-3.4.1.js"></script>
    <script src="./rsc/js/popper.min.js"></script>
    <script src="./rsc/js/bootstrap.min.js"></script>
</body>
</html>