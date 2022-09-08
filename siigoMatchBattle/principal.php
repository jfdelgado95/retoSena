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
    <body onload="iniciar">
        <div class="container">
        <div id='banner'> 
            <h3 align="center" valign="center"></h3>
        </div>
            <div id="reloj" />
            <div id="tiempo">
        </div>


        <div id="contenido"><?=include $_REQUEST['CONTENIDO']?></div>
        
        </div>
            
        <!--<script type="text/javascript">
            function muestraReloj() {
                var fechaHora = new Date();
                fechaHora.setHours(0,0,0,0);
                var horas = fechaHora.getHours();
                var minutos = fechaHora.getMinutes();
                var segundos = fechaHora.getSeconds();

                if(horas < 10) { horas = '0' + horas; }
                if(minutos < 10) { minutos = '0' + minutos; }
                if(segundos < 10) { segundos = '0' + segundos; }

                document.getElementById("reloj").innerHTML = horas+':'+minutos+':'+segundos;
              }

              window.onload = function() {
                setInterval(muestraReloj, 1000);
              }
        </script>-->
    </body>
    </div>
</html>