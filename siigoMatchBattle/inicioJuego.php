<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
require_once './logica/clases/Usuario.php';
require_once './logica/clases/TipoUsuario.php';
require_once './logica/clases/Carta.php';

$nombre = $_REQUEST['nombre'];
$clave = $_REQUEST['clave'];
//require_once './presentacion/imagenes/usuario1.png';
//require_once './presentacion/configuracion/cartas.php';
$nombre = $_REQUEST['nombre'];

?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <div class="container">
        <div class="jumbotron mb-2 p-md-5 text-white" style="background-color:#0274bc">      
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
                <td><?=$nombre?></td><td>Juan</td><td>Pedro</td><td>Julián</td>
            </tr>
        </table>
        <br>
        <a href="./principal.php?CONTENIDO=./presentacion/configuracion/cartas.php">Iniciar</a>
    </div>