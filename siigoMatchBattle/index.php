<?php
$servername = "localhost";
$username = "adsi";
$password = "utilizar";
$dbname = "siigomatchbattle";

// Conexion
$conn = new mysqli($servername, $username, $password, $dbname);
// Check conexion
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<?php

session_start();
//session_unset();
//session_destroy();
//$mensaje='';
//if (isset($_REQUEST['mensaje'])) $mensaje=$_REQUEST['mensaje'];

//Codigo para generar el codigo de la partida
$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
 
function generarCodigoPartida($input, $strength = 16) {
    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }
    return $random_string;
}
$codigoPartida= generarCodigoPartida($permitted_chars, 6);


$jugadores=7;
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

$bandera=false;

for ($j = 0; $j < $jugadores; $j++) {
    for ($i = 0; $i < $cartas; $i++) {
        
        if(${"cartasJugador".$j}[$i]==0){
            echo "Debe comenzar el jugador".$j+1;
            $bandera=true;
            break;
            break;
            
        }
    }
}

if($bandera==false){
    for ($j = 0; $j < $jugadores; $j++) {
    for ($i = 0; $i < $cartas; $i++) {
        
        if(${"cartasJugador".$j}[$i]==1){
            echo"La carta 1B la tiene el jugardo ". $j;
            $bandera=true;
            break;
            break;            
        }
    }
}
}

$valor= array();
for ($j = 0; $j < $jugadores; $j++) {
    $cadenaSQL= "select valor from carta where id='".${"cartasJugador".$j}[0]."'";
    $result= $conn->query($cadenaSQL);
    echo $cadenaSQL;

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          array_push($valor, $row["valor"]);
        //$valor. = $row["valor"];
        //echo "Código: ".$row["ca_codJugador"]." - Jugadores: ".$row["ca_numJugador"]."<br>";
      }
    } 
    
}

//for ($j = 0; $j < $jugadores; $j++) {
    print_r ($valor);
//}
    
    $gana= array_search(max($valor), $valor);
    echo "<br>gana".$gana;
    
    for ($j = 0; $j < $jugadores; $j++) {
        if($j!=$gana){
           array_push(${"cartasJugador".$gana}, ${"cartasJugador".$j}[0]); 
           unset(${"cartasJugador".$j}[0]);
        }
    }
    
    for ($j = 0; $j < $jugadores; $j++) {
    
    echo "<br>";
    print_r(${"cartasJugador".$j});
    echo "<br>";
}

?>
<html>
    <head>
        <meta charset="utf-8">        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">    
        <title></title>
    </head>
    <body style="background-color: #c1e8f7;">
      <div class="container py-5 h-100 ">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card bg-dark text-white" style="border-radius: 1rem;">
              <div class="card-body p-5 text-center">

                <div class="mb-md-5 mt-md-4 pb-5">
                <form name="formulario" method='post' action='principal.php?CONTENIDO=presentacion/configuracion/cartas.php'>
                    <h1 class="fw-bold mb-2 text-uppercase">Siigo Match Battle</h1>
                    
                    <h4>Ingrese código de partida:</h4><br><br>

                    <div class="form-outline form-white">
                        <input type="text" id="nombre" name="sesionId" value="" class="form-control form-control-lg" />
                        
                    </div><br>
                    <button class="btn btn-outline-light btn-lg px-5" type="submit">Entrar</button>
                </form>
                <div>
                <form name="formulario" method='post' action='principal.php?CONTENIDO=inicioJuego.php'>
                    <select name="jugadores" value="Numero de jugadores:">    
                        <option value="2">2 jugadores</option>    
                        <option value="3">3 jugadores</option>    
                        <option value="4" selected>4 jugadores</option>    
                        <option value="5">5 jugadores</option>    
                        <option value="6">6 jugadores</option>
                        <option value="7">7 jugadores</option>
                    </select>
                    <br>
                    <input type="label" name="codigoPartida" value="<?= $codigoPartida?>" align="center">
                    <br>
                    <button class="btn btn-outline-light btn-lg px-5" type="submit">Crear partida</button>
                </form>
                </div>
              </div>
            </div>
          </div>
        </div>    
      </div>
    </body>
</html>