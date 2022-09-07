<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
require_once './logica/clases/Usuario.php';
require_once './logica/clases/TipoUsuario.php';
require_once './logica/clases/Carta.php';

//$nombre = $_REQUEST['nombre'];
//$clave = $_REQUEST['clave'];

?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <div class="container">
        <div class="jumbotron mb-2 p-md-5 text-white" style="background-color:#343a40">      
            <center><h1 class="display-4">Inicio del juego</h1></center>                       
        </div>
        <br>
        <table>
            <tr>
                <td><img src="./presentacion/imagenes/usuario1.png" height="250px" width="250px"/></td>
                <td><img src="./presentacion/imagenes/usuario2.png" height="250px" width="250px"/></td>
                <td><img src="./presentacion/imagenes/usuario3.png" height="250px" width="250px"/></td>
                <td><img src="./presentacion/imagenes/usuario4.png" height="250px" width="250px"/></td>
            </tr>
            <tr>
                <td>Jugador 1</td><td>Jugador 2</td><td>Jugador 3</td><td>Jugador 4</td>
            </tr>
        </table>
        <br>
        <form name="iniciar" method="post" action="principal.php?CONTENIDO=presentacion/configuracion/cartas.php">
            
            <center>
                <input type="text" name="jugadores" value="" placeholder="Ingrese el número de jugadores" size="50">
                <br>
                <br>
                <input type="submit" name="iniciarPartida" value="Iniciar" size="250" style="width:600px;height:100px;">
            </center>
        </form>
    </div>