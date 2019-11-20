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
             
              //Si el iterador es menor que la cantidad de niveles se ejecuta :v
              if ($i<count($niveles_usuario)) {

                //Saco el porcentaje para obtener los pixeles que tiene la barra indicadora de cada ejercicio
                $barra_porcentaje = (((($niveles_usuario[$i][6])*100)/10) * 250)/100;

                //Si el porcentaje es igual que el ancho total de la card o si el estado del juego es finalizado entonces se ejecuta
                if($barra_porcentaje == 250 or $niveles_usuario[$i][9] == "si")
                {
                  $felicitaciones = "Nivel Completo :D";
                  $boton_jugar ="<a href='#popup-article' class='rainbow-button' alt='Volver a jugar' style='font-size:1.2vw'></a>";
                }
                //Sino se muestran mensajes para que lo intentes :D
                else{
                  $felicitaciones = "";
                  $boton_jugar = "<a href='#popup-article' class='rainbow-button' alt='Intentar'></a>
                 
                  ";
                }
      
                $i++;
              }
              else
              {
                $barra_porcentaje=0;
                $felicitaciones = "";
                $boton_jugar = "<a href='#popup-article' class='rainbow-button' alt='Intentar'></a>";
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


    <style>
    
/* popup */

.popup{
  width: 100%;
  height: 100vh;
  display: none;

  position: fixed;
  top: 0;
  right: 0;
}

#popup-article:target{
  display: flex;
}

.popup:before{
  content: "";
  box-sizing: border-box;
  width: 100%;
  background-color: #fff;

  position: fixed;
  left: 0;
  top: 50%;
  will-change: height, top;
  animation: open-animation .6s cubic-bezier(0.83, 0.04, 0, 1.16) .65s both;
}

.popup:after{
  content: "";
  width: 0;
  height: 2px;
  background-color: #f0f0f0;

  will-change: width, opacity;
  animation: line-animation .6s cubic-bezier(0.83, 0.04, 0, 1.16) both;

  position: absolute;
  top: 50%;
  left: 0;
  margin-top: -1px;
}

@keyframes line-animation{

  0%{
    width: 0;
    opacity: 1;
  }

  99%{
    width: 100%;
    opacity: 1;
  }

  100%{
    width: 100%;
    opacity: 0;
  }  
}

@keyframes open-animation{

  0%{
    height: 0;
    top: 50%;
  }

  100%{
    height: 100vh;
    top: 0;
  }
}

.popup__block{
  height: calc(100vh - 40px);
  padding: 5% 15%;
  box-sizing: border-box;
  position: relative;
  
  margin: auto;
  overflow: auto;
  animation: fade .5s ease-out 1.3s both;
}

@keyframes fade{

  0%{
    opacity: 0;
  }

  100%{
    opacity: 1;
  }
}

.popup__title{
  font-size: 2.5rem;
  margin: 0 0 1em;
}

.popup__close{
  width: 3.2rem;
  height: 3.2rem;
  text-indent: -9999px;
  
  position: fixed;
  top: 20px;
  right: 20px;

  background-repeat: no-repeat;
  background-position: center center;
  background-size: contain;
  background-image: url(data:image/svg+xml;base64,PHN2ZyBmaWxsPSIjMDAwMDAwIiBoZWlnaHQ9IjI0IiB2aWV3Qm94PSIwIDAgMjQgMjQiIHdpZHRoPSIyNCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4gICAgPHBhdGggZD0iTTE5IDYuNDFMMTcuNTkgNSAxMiAxMC41OSA2LjQxIDUgNSA2LjQxIDEwLjU5IDEyIDUgMTcuNTkgNi40MSAxOSAxMiAxMy40MSAxNy41OSAxOSAxOSAxNy41OSAxMy40MSAxMnoiLz4gICAgPHBhdGggZD0iTTAgMGgyNHYyNEgweiIgZmlsbD0ibm9uZSIvPjwvc3ZnPg==);
}


/*
* demo page
*/

@media screen and (min-width: 768px){

  html{
    font-size: 62.5%;
  }
}

@media screen and (max-width: 767px){

  html{
    font-size: 50%;
  }
}

body{
  font-family: -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Open Sans, Ubuntu, Fira Sans, Helvetica Neue, sans-serif;
  font-size: 1.6rem;
  color: #222;
  background-color: #512da8;

  margin: 0;
  -webkit-overflow-scrolling: touch;   
  overflow-y: scroll;
}

p{
  margin: 0;
  line-height: 1.5;
}

p:not(:last-child){
  margin-bottom: 1.5rem;
}

img{
  display :block;
  max-width: 100%;
}

a{
  text-decoration: none;
}

.open-popup{
  color: #fff;
  text-transform: uppercase;
  padding: 1rem 2rem;
  border: 1px solid;
}

.page{
  min-height: 100vh;
  display: flex;
}

.page__container{
  max-width: 1200px;
  padding-left: 1rem;
  padding-right: 1rem;  
  margin: auto;
}

/*
=====
LinkedIn
=====
*/

.linkedin{
  background-color: #f0f0f0;
  text-align: center;
  padding: 1rem;
  font-size: 1.8rem;
  margin-bottom: 2rem;
}

.linkedin__text{
  margin-top: 0;
  margin-bottom: 0;
  font-size: 3.5rem;
}

.linkedin__link{
  color: #ff5c5c;
}
    </style>



<div id="popup-article" class="popup">
  <div class="popup__block">
    <div class="linkedin">
      <div class="linkedin__container">
        <p class="linkedin__text">Nivel 1</p>
      </div>
    </div>
    <p><h1 class="popup__title">Indicaciones</h1> Cuenta cuantos vegetales hay en cada recuadro y selecciona con ayuda del mouse el numero que indica la respuesta correcta.</p>
        <a href="#" class="popup__close">close</a>
  </div>
</div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../rsc/js/jquery-3.4.1.js"></script>
    <script src="../rsc/js/popper.min.js"></script>
    <script src="../rsc/js/bootstrap.min.js"></script>

    <script>
      //Funcion que controla el evento para pasar encima el mouse sobre el componente
      function hover_card(porciento){
        $(".card").hover(function(){
          //Aca pongo el porcentaje calculado para obtener la distancia de la barra
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