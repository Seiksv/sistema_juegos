<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Juego</title>
    <style>
        *{
            margin: 0px;
            padding: 0px;
        }
        body{
            background: #5E9783;
            font-family: "century gothic";
        }
        .padre{
            width: 50%;
            height: 500px;
            background: #3557F1;
            border-radius: 15px;
            margin: 0px auto;

            display: flex;
            flex-direction: row;
            flex-wrap: wrap;

            justify-content: center;
            align-items: center;
        }
        .padre div{
            width: 70%;
        }
        h1{
            font-size: 45px;
            color: black;
            margin-top: 100px;
        }
        .error{
            font-size: 25px;
            color: #fc5127;
            text-align: center;
        }
        .ok{
            font-size: 25px;
            color: #687BD7;
            text-align: center;
        }
        footer{
            width: 100%;
            min-height: 60px;
            position: fixed;
            bottom: 0px;
        }
        a{
            font-size: 1.3em;
            background:  #687BD7;
            box-shadow: #687BD7;
            text-align: center;
            text-decoration: none;
            padding: 10px;
            border-radius: 25px;
            float: right;
            margin-right: 20px;
            color:  #687BD7;
        }
        form{
            color: black;
            font-size: 1.2em;
        }
    
        table{
            width: 100%;
            margin: auto;
        }
        td{
            height: 40px;
        }
        input[type=submit]{
            height: 50px;
            width: 150px;
            font-size: 1em;
            border: none;
            background: #687BD7;
            color: white;
        }

    </style>
</head>
<body>
    <p><h1 align="center">INDICACIONES DEL JUEGO</h1></p>
        <br>
        <p align="center"> Acontinuacion desarrollaremos un juego utilizando la operacion basica "RESTA" divierte seleccionando la respuesta correcta!!!</p>

    <h1 align=center><i>COMENZEMOS !!!</i></h1>
    <div class=padre>
        <div>
            <form action="" method="post">
                <table align=center border=0>
                    <tr>
                        <td align=right><img src="estrella.jpg" width='200' height='100' /></td>
                        <td> 2 <input type="radio" name="resul1" value=2></td>
                        <td> 1 <input type="radio" name="resul1" value=1></td>
                        <td> 3 <input type="radio" name="resul1" value=3></td>
                    </tr>
                    <tr>
                        <td align=right><img src="man.jpg" width='200' height='100' /></td>
                        <td> 3 <input type="radio" name="resul2" value=3></td>
                        <td> 2 <input type="radio" name="resul2" value=2></td>
                        <td> 4 <input type="radio" name="resul2" value=4></td>
                    </tr>
                    <tr>
                      <td align=right><img src="pato.jpg" width='200' height='100' /></td>
                        <td> 5 <input type="radio" name="resul3" value=5></td>
                        <td> 2 <input type="radio" name="resul3" value=2></td>
                        <td> 7 <input type="radio" name="resul3" value=7></td>
                    </tr>

                    <tr><td></td></tr>
                    <tr>
                        <td colspan=5 align=center><input type="submit" value="Enviar" name=envi></td>
                    </tr>
                </table>
            </form>
            </br>
           <?php

                if(isset($_POST["envi"])){
                    
                    if(isset($_COOKIE["resultado"])){
                        echo "<h2 class=error> Volver a intentar mas tarde!!!</h2>";
                    }else{
                        setcookie("resultado", "resultado", time()+60);
                        echo "<h2 class=ok>Felicidades!!!</h2>";
                    }
                }
            ?>
        </div>
    </div>
    
</body>
</html>