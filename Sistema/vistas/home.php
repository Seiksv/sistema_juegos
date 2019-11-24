<!DOCTYPE html>
<html class="menu">
<html>

<head>

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content=="IE=edge" />
    <meta name="google" value="notranslate" />
    <title>Side Menu</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../rsc/css/Bootstrap.min.css" />
    <link href="../rsc/css/all.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../rsc/css/tema_principal.css">
    <link rel="stylesheet" type="text/css" href="../rsc/css/style.css">
    <link rel="stylesheet" type="text/css" href="../rsc/fontawesome/css/all.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
    
</head>

<body>
<?php 
  
  include_once("../rutas.php"); 
  include_once(USER_SESSION);
  include_once(BASE_DATOS);

  $userSession = new UserSession();   
  include("assets/menu_lateral.php");
  ?>
  <style>
 

body {
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

#wrapper {
  text-align: center;
  color: #000;
  font-weight: bold;
  font-size: 6em;
  padding: 50px 0;
}

span { 
  text-shadow: -0.06em 0 red,  0.06em 0 cyan; /* This creates the 3D effect, pretty easy, eh? */
  letter-spacing: 0.08em; /* make sure the letters don't overlap */
}

p {
  margin: 0;
}

/* ---------------- Stars ---------------- */

#stars span {
  display: inline-block;
  transform: scale(1);
  transition: transform 2s cubic-bezier(0, 1, 0, 1);
}
#stars span:hover {
  cursor: crosshair;
  transform: scale(1.3); /* This adds a hover effect */
  transition: transform .2s cubic-bezier(0, 0.75, 0, 1);
}
#stars span:active {
  text-shadow: none; /* Click to disable the 3D effect */
}

/* Below the stars animation */
#stars span:nth-child(1), #stars span:nth-child(5) { font-size: 0.3em; animation-delay: 0.2s; }
#stars span:nth-child(2), #stars span:nth-child(4) { font-size: 0.5em; animation-delay: 0.1s; }
#stars span:nth-child(3) { font-size: 0.8em; animation-delay: 0s; }

#stars span { animation: stars-animation 3s 50 ease-in-out; }

@-webkit-keyframes stars-animation {
  0% { transform: scale(1); }
  90% { transform: scale(1); }
  95% { transform: scale(1.3); }
  100% { transform: scale(1); }
}

#stars:hover span {
  animation: none; /* Disables the animation on hover */
}


/* ---------------- Title ---------------- */

#title {
  font-family: Helvetica, Geneva, sans-serif; /* Any font would work, but SansSerif looks better */
}
#title:focus {
  outline: none;
}
#title span {
  vertical-align: middle;
  line-height: 1.1em;
  transition: font-size 2s cubic-bezier(0, 1, 0, 1);
}
#title span:hover {
  font-size: 1.3em; /* This adds a hover effect */
  line-height: 1em;
  transition: font-size .2s cubic-bezier(0, 0.75, 0, 1);
}
#title span:active {
  font-size: 1em;
  text-shadow: none; /* Click to disable the 3D effect */
}
#title span::selection {
  background-color: red; /* This hides the selection */
}


/* ---------------- Slogan ---------------- */

#slogan { font-size: 0.25em; }
#slogan span:active { text-shadow: none; }




/* Below just some styling for the meta info */

#meta {
  color: #777;
  font-size: 1.2em;
  line-height: 1.6em;
  text-align: center;
  text-shadow: rgba(255,255,255,0.5) 0 1px 0;
  margin: 30px;
}
#meta strong { font-weight: bold; color: #000; }
#meta p:first-child { margin-bottom: 20px; }
#meta a { text-decoration: none; color: #7276ff; }
#meta a:hover { color: rgba(114,118,255,0.5); }
#meta img { vertical-align: text-bottom; }
  </style>
    <div class="cuerpo">
   <!-- <h1 class="titulo_bienvenido">Bienvenidos a InteracMatch</h1>!-->
   <div id="wrapper">
  
  <p id="stars"><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span></p>
  <p id="title" contenteditable="true" spellcheck="false"><span style="text-shadow: -0.06em 0 grey,  0.06em 0 cyan;">Bienvenido a </span><span style="text-shadow: -0.06em 0 grey,  0.06em 0 cyan;">Interact</span><span style="text-shadow: -0.06em 0 pink,  0.06em 0 cyan;">Math</span>
</p>
 <div class="text-center" style="  justify-content: center;margin-left:auto;margin-rigth:auto;">
    <button class=" titulo_bienvenido btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">Ver video</button>


 </div>
  
</div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Video de bienvenida :D</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
          <iframe width="100%" height="480" src="../rsc/video/home.mp4" frameborder="0" allowfullscreen="allowfullscreen"></iframe>

        </div>
         
        </div>
      </div>
    </div>
    
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../rsc/js/jquery-3.4.1.js"></script>
    <script src="../rsc/js/popper.min.js"></script>
    <script src="../rsc/js/bootstrap.min.js"></script>
</body>

</html>