<head>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300i,400" rel="stylesheet">
    <style>
    body {
        background-color: #100e17;
        font-family: 'Open Sans', sans-serif;
    }

    .container {
        position: absolute;
        height: 300px;
        width: 600px;
        top: 25%;
        left: calc(50% - 300px);
        display: flex;
    }

    .card {
        display: flex;
        height: 450px;
        width: 350px;
        background-color: #17141d;
        border-radius: 10px;
        box-shadow: -1rem 0 3rem #000;
        /*   margin-left: -50px; */
        transition: 0.4s ease-out;
        position: relative;
        left: 0px;
    }

    .card:not(:first-child) {
        margin-left: -250px;
    }

    .card:hover {
        transform: translateY(-20px);
        transition: 0.4s ease-out;
    }

    .card:hover~.card {
        position: relative;
        left: 200px;
        transition: 0.4s ease-out;
    }

    .title {
        color: white;
        font-weight: 300;
        position: absolute;
        left: 20px;
        top: 15px;
    }

    .bar {
        position: absolute;
        top: 100px;
        left: 30px;
        height: 5px;
        width: 250px;
    }

    .emptybar {
        background-color: #2e3033;
        width: 100%;
        height: 100%;
    }

    .filledbar {
        position: absolute;
        top: 0px;
        z-index: 3;
        width: 0px;
        height: 100%;
        background: rgb(0, 154, 217);
        background: linear-gradient(90deg, rgba(0, 154, 217, 1) 0%, rgba(217, 147, 0, 1) 65%, rgba(255, 186, 0, 1) 100%);
        transition: 0.6s ease-out;
    }

    .card:hover .filledbar {
        transition: 0.4s ease-out;
    }

    .circle {
        position: absolute;
        top: 150px;
        left: calc(50% - 60px);
    }

    .stroke {
        stroke: white;
        stroke-dasharray: 360;
        stroke-dashoffset: 360;
        transition: 0.6s ease-out;
    }

    svg {
        fill: #17141d;
        stroke-width: 2px;
    }

    .card:hover .stroke {
        stroke-dashoffset: 100;
        transition: 0.6s ease-out;
    }


    .rainbow-button {
  width:calc(8vw + 6px);
  height:calc(4vw + 6px);
  background-image: linear-gradient(90deg, #00C0FF 0%, #FFCF00 49%, #FC4F4F 80%, #00C0FF 100%);
  border-radius:5px;
  display:flex;
  align-items:center;
  justify-content:center;
  font-size:1.4vw;
  font-weight:bold;
  color:white;
}
.rainbow-button:after {
  content:attr(alt);
  width:8vw;
  height:4vw;
  background-color:#191919;
  display:flex;
  align-items:center;
  justify-content:center;
}
.rainbow-button:hover {
  animation:slidebg 2s linear infinite;
}

@keyframes slidebg {
  to {
    background-position:20vw;
  }
}
    </style>
    <!-- Bootstrap CSS -->

    <link rel="stylesheet" type="text/css" href="../rsc/css/tema_principal.css">
    <link rel="stylesheet" type="text/css" href="../rsc/css/style.css">
    <link rel="stylesheet" type="text/css"
        href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
    <?php 
//Incluyo los archivos que necesitare
  include_once("../rutas.php"); 
  include_once(USER_SESSION);
  include_once(MODELOS."niveles.php");

//Instancio las clases
$userSession = new UserSession();   
$niveles = new Niveles();
  //Obtengo los niveles

$niveles_juego = $niveles->getNiveles();
$niveles_usuario = $niveles->getNivelesUser($userSession->getCurrentUser());


  ?>

</head>

<body>
  <?php
  //Inserto el menu lateral
  include_once("assets/menu_lateral.php");
  ?>
  
    <div class="container">
        <?php 
      
        //Inicializo $html 
            $html="";
            $i=0;
            //Recorro el arrego de niveles
            foreach ($niveles_juego as $nivel) {
             
              if ($i<count($niveles_usuario)) {
                $barra_porcentaje = (((($niveles_usuario[$i][6])*100)/10) * 250)/100;
                if($barra_porcentaje == 250)
                {
                  $felicitaciones = "Nivel Completo :D";
                  $boton_jugar ="";
                }
                else{
                  $felicitaciones = "";
                  $boton_jugar = "<a href='#' class='rainbow-button' alt='Intentar'></a>";
                }
                  

                $i++;
              }
              else
              {
                $barra_porcentaje=0;
                $felicitaciones = "";
                $boton_jugar = "<a href='#' class='rainbow-button' alt='Intentar'></a>";
              }
            
              //Los almaceno en $html
            $html .='
            <div class="card" id="id_'.$nivel['idJuego'].'" onmouseover="hover_card('.$barra_porcentaje.')">
              <h3 class="title">'.$nivel['nombre'].'</h3>
              <div class="bar">
                <div class="emptybar"></div>
                <div class="filledbar"></div>
              </div>
              
              <div class="circle">
              '.$felicitaciones.'
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg">
                <circle class="stroke" cx="60" cy="60" r="50"/>
              </svg>
              '.$boton_jugar.'
              </div>
            </div>
            ';
           
           
            }
            //Imprimo en pantalla
            echo $html;
          ?>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../rsc/js/jquery-3.4.1.js"></script>
    <script src="../rsc/js/popper.min.js"></script>
    <script src="../rsc/js/bootstrap.min.js"></script>

    <script>
      function hover_card(porciento){
        $(".card").hover(function(){
          $('.filledbar', this).css({
            "width": porciento+"px"
          });
        }, function() {
          $('.filledbar', this).css({
            "width": "0px"
          });
        });
       }
    </script>
</body>