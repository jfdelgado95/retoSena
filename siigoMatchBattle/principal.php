<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
require_once './logica/clases/Usuario.php';
require_once './logica/clases/TipoUsuario.php';
require_once './logica/clases/Carta.php';
require_once './logica/clasesGenericas/conectorBD.php';
?>

<html>
    <head>
    	<meta charset="UTF-8">
    	<title>Partida</title>
    	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous" />

    </head>
    <body>
    	<div class="container">
            <div id='banner'>
        	<h3 align="center" valign="center"></h3>
       	 
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-2 offset-5">
                                <div class="card align-items-center">

                                    <div id="safeTimer" text>
                                	<h3>Tu tiempo</h3>
                                    <center><h5 id="safeTimerDisplay">0:0</h5></center>
                                    </div>
               	 
                                </div>
                            </div>
                        </div>         	 
                    <div id="contenido"><?=include $_REQUEST['CONTENIDO']?>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>
    <script>
    	function timer(){
            var sec = 0;
            var min = 0;
            var timer = setInterval(function(){
                    document.getElementById('safeTimerDisplay').innerHTML=min+':'+sec;
                    sec++;

                    if (sec > 60){
                    min++;
                    sec = 0;
                    document.getElementById('safeTimerDisplay').innerHTML=min+':'+sec;
                    }

                    if (min == 60){
                    alert('El juego ha finalizado');
                    clearInterval(timer);
                    }

            }, 1000);
        }
    </script>        	 

