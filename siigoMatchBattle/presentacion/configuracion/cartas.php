<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
//echo $_REQUEST['id'];
//$USUARIO= unserialize($_SESSION['usuario']);
//require_once '../../logica/clases/Carta.php';
//require_once '../../logica/clasesGenericas/conectorBD.php';


//Se recibe la baraja en un array
$baraja= Carta::getInfo();
$jugadores=$_REQUEST['jugadores'];

$div=$jugadores%2;

if ($div){
    $jugadores++;
}

$cartas=32/$jugadores;

//Se mezcla y se reparte la baraja en los jugadores
shuffle($baraja);
$barajaRepartida = array_chunk($baraja, $cartas, true);

$lista='';
for ($n = 0; $n < $jugadores; $n++) {
    $cartasJugador= array($barajaRepartida[$n]);
    echo 'Cartas Jugador= <br>';
    print_r($cartasJugador);
}


$resultado= Carta::getListaEnObjetos(null, null);
for ($i = 0; $i < count($resultado); $i++) {
    $cartas =$resultado[$i];
    $lista.="<table border='1' align='center'>";    
    $lista.="<tr>";    
    $lista.="<th colspan='2'>{$cartas->getCodigo()}</th>";            
    $lista.="</tr>";
    $lista.="<tr>";
    $lista.="<td colspan='2'><img src='presentacion/imagenes/logos/{$cartas->getImagen()}' width='200' height='200'/></td>";
    $lista.="</tr>";
    $lista.="<tr>";
    $lista.="<th colspan='2'>{$cartas->getNombre()}</th>";
    $lista.="</tr>";
    $lista.="<tr>";
    $lista.="<th>Valor del equipo (Euros)</th>";
    $lista.="<td>{$cartas->getValor()}</td>";
    $lista.="</tr>";
    $lista.="<tr>";
    $lista.="<th>Titulos del equipo</td>";
    $lista.="<td>{$cartas->getTitulo()}</th>";
    $lista.="</tr>";
    $lista.="<tr>";
    $lista.="<th>Jugador mas valioso (Euros)</th>";
    $lista.="<td>{$cartas->getJugador()}</td>";
    $lista.="</tr>";
    $lista.="</table>";
    $lista.="<p></p>";
}

?>
<head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <br>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                        <div class="card align-items-center">
                        <h3>Jugador 1</h3><img src="presentacion/imagenes/usuario1.png" class="rounded" width="200px" height="200px">
                        <img src="presentacion/imagenes/carta.png" width="50px" height="50px">X cartas
                        </div>
                </div>
                <div class="col-md-4 offset-4">
                        <div class="card align-items-center">
                        <h3>Jugador 2</h3>
                        <img src="presentacion/imagenes/usuario2.png" class="rounded" width="200px" height="200px">
                        <img src="presentacion/imagenes/carta.png" width="50px" height="50px">X cartas
                        </div>
                </div>
            </div>
        </div>    
        <br><br><br><br><br><br><br><br><br><br><br>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                        <div class="card align-items-center">
                        <h3>Jugador 3</h3>
                        <img src="presentacion/imagenes/usuario3.png" class="rounded" width="200px" height="200px">
                        <img src="presentacion/imagenes/carta.png" width="50px" height="50px">X cartas
                        </div>
                </div>
                <div class="col-md-4 offset-4">
                        <div class="card align-items-center">
                        <h3>Jugador 4</h3>
                        <img src="presentacion/imagenes/usuario4.png" class="rounded" width="200px" height="200px">
                        <img src="presentacion/imagenes/carta.png" width="50px" height="50px">X cartas
                        </div>
                </div>
            </div>
        </div>
    </div>



    <table border="1" align="center">
            <?=$lista?>
    </table>

    <script type="text/javascript">
    function eliminar(id){
            var respuesta=confirm("¿Está seguro de eliminar este registro?");
            if (respuesta)location="principal.php?CONTENIDO=presentacion/configuracion/cartasActualizar.php&accion=Eliminar&id="+id;
    }
    </script>
    <script type="text/javascript">
    function mostrarImagen(){
            var lector=new FileReader();
            lector.readAsDataURL(document.formulario.imagen.files[0]);
            lector.onloadend = function (){
            document.getElementById("imagen").src=lector.result;
            };
    }
    </script>
</body>
