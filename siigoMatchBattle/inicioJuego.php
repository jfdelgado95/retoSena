<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
require_once './logica/clases/Usuario.php';
require_once './logica/clases/TipoUsuario.php';
require_once './logica/clases/Carta.php';
require_once './logica/clasesGenericas/conectorBD.php';

$codigoPartida= $_REQUEST['codigoPartida'];
$jugadores= $_REQUEST['jugadores'];
//echo $codigoPartida;
$cadenaSQL="insert into partida (codigo, jugadores) values ('$codigoPartida', '$jugadores');";
$resultado= conectorBD::ejecutarQuery($cadenaSQL);

$cartas=floor(32/$jugadores);
echo "<br>";
$num= array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31);
$cartasJugador0= array();
$cartasJugador1= array();
$cartasJugador2= array();
$cartasJugador3= array();
$cartasJugador4= array();
$cartasJugador5= array();
$cartasJugador6= array();
$control=0;

for ($j = 0; $j < $jugadores; $j++) {
    for ($i = 0; $i < $cartas; $i++) {
        shuffle($num);
        array_push(${"cartasJugador".$j}, $num[0]);
        $clave= array_search($num[0], $num);
        unset($num[$clave]);
    }
    echo "<br>";
    print_r(${"cartasJugador".$j});
}
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <div class="container">
        <div class="jumbotron mb-2 p-md-5 text-white" style="background-color:#343a40">      
            <center><h1 class="display-4">Inicio del juego</h1></center>                       
        </div>
        <br>
        <table align="center">
            <tr>
            <?php
            for ($i = 0; $i < $jugadores; $i++) {
                echo "<td><img src='./presentacion/imagenes/usuario{$i}.png' height='150px' width='150px'/></td>";
            }
            ?>
            </tr>
            <tr>
            <?php
            $n=1;
            for ($i = 0; $i < $jugadores; $i++) {
                echo "<td>Jugador $n</td>";
                $n++;
            }
            ?>
        </table>
        <br>
        <form name="iniciar" method="post" action="principal.php?CONTENIDO=presentacion/configuracion/cartas.php">
            <center>
                <input type="hidden" name="cartasJugador0" value="<?= $cartasJugador0 ?>">
                <input type="hidden" name="cartasJugador1" value="<?= $cartasJugador1 ?>">
                <input type="hidden" name="cartasJugador2" value="<?= $cartasJugador2 ?>">
                <input type="hidden" name="cartasJugador3" value="<?= $cartasJugador3 ?>">
                <input type="hidden" name="cartasJugador4" value="<?= $cartasJugador4 ?>">
                <input type="hidden" name="cartasJugador5" value="<?= $cartasJugador5 ?>">
                <input type="hidden" name="cartasJugador6" value="<?= $cartasJugador6 ?>">
                <input type="hidden" name="codigo" value="<?= $codigoPartida ?>">
                <input type="hidden" name="jugadores" value="<?= $jugadores ?>">
                <input type="submit" name="iniciarPartida" value="Iniciar" size="250" style="width:600px;height:100px;">
            </center>
        </form>
    </div>