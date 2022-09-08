<?php
$servername = "localhost";
$username = "adsi";
$password = "utilizar";
$dbname = "siigomatchbattle";

// Creacion de la conexon
$conn = new mysqli($servername, $username, $password, $dbname);
// Verificacion de la conexion
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//Fin conexion

$codigoPartida= $_REQUEST['codigo'];
$jugadores= $_REQUEST['jugadores'];

//echo $codigoPartida;
//echo $jugadores;

/*
//print_r ($_REQUEST['sesionId']);
if ($_REQUEST['codigo']!==null){
    //echo $_REQUEST['sesionId'];
    $cadenaSQL= "select jugadores from partida where codigo='".$_REQUEST['codigo']."'";
    $result= $conn->query($cadenaSQL);
}

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $cuenta = $row["jugadores"];
    //echo "Código: ".$row["ca_codJugador"]." - Jugadores: ".$row["ca_numJugador"]."<br>";
  }
} else {
  echo "Sin resultados";
}

echo "<br>";
//print_r ($cuenta);
if ($cuenta>=1 && $cuenta<7){
    //echo "Mensaje";
    $cadenaSQL= "update partida set jugadores=".($cuenta+1)." where codigo='".$_REQUEST['codigo']."'";
    $resultado= $conn->query($cadenaSQL);
    //echo $cadenaSQL;
}else {
    $jugadores=7;
}

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
    //echo "<br>";
    //print_r(${"cartasJugador".$j});
}
*/
$jugadores=$_REQUEST['jugadores'];
$cartas=floor(32/$jugadores);

if (isset($_POST)) {
    for ($i = 0; $i < $jugadores; $i++) {
        ${"cartasJugador$i"}= $_POST["resultado$i"];
    }
}

//Codigo para determinar quien comienza a jugar
$bandera=false;
$cartaInicio=0;
for ($j = 0; $j < $jugadores; $j++) {
    for ($i = 0; $i < $cartas; $i++) {
        if(${"cartasJugador".$j}[$i]==$cartaInicio){
            $bandera=true;
            echo "<br>";
            echo "<br>";
            echo "<h3 align='center'>Debe comenzar el jugador ".$j."</h3>";
            echo "<br>";
            echo "<br>";
            $cartaInicio++;
        }
    }
}
//Fin codigo para determinar quien comienza a jugar
/*
//Muestra los equipos de cada jugador
$nombre= array();
for ($j = 0; $j < $jugadores; $j++) {
    for ($i = 0; $i < $cartas; $i++) {
        $cadenaSQL= "select nombre from carta where id='".${"cartasJugador".$j}[0]."'";
        $result= $conn->query($cadenaSQL);
        echo $cadenaSQL;

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($nombre, $row["nombre"]);
            }
        } 
    }
}
print_r($nombre);
//Fin muestra los equipos de cada jugador
*/
$valor= array();
for ($j = 0; $j < $jugadores; $j++) {
    $cadenaSQL= "select valor from carta where id='".${"cartasJugador".$j}[0]."'";
    $result= $conn->query($cadenaSQL);
    //echo $cadenaSQL;
    
/*
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            array_push($valor, $row["valor"]);
            //$valor. = $row["valor"];
            //echo "Código: ".$row["ca_codJugador"]." - Jugadores: ".$row["ca_numJugador"]."<br>";
        }
    }
 * 
 */ 
    
}

$lista = '';
for ($i = 0; $i < $jugadores; $i++) {
    //for ($j = 0; $j < $cartas; $j++) {
        //print_r(${"cartasJugador$i"});
        //echo "<br>";
        $idBuscado= ${"cartasJugador$i"}[0];
        $cadenaSQL = "select * from carta where id=$idBuscado";//select de la carta que se muestra segun el id
        //echo $cadenaSQL;
        $resultado = conectorBD::ejecutarQuery($cadenaSQL);
        $lista.= '<tr>';
        $lista.= "<th colspan='3'>{$resultado['0']['1']}</th>";
        $lista.= '</tr>';
        $lista.= '<tr>';
        $lista.= "<td colspan='3' align='center'><img src='presentacion/imagenes/logos/{$resultado['0']['3']}' width='200' height='200'/></td>";
        $lista.= '</tr>';
        $lista.= '<tr>';
        $lista.= "<td colspan='3'>{$resultado['0']['2']}</td>";
        $lista.= '</tr>';
        $lista.="<tr>";
        $lista.="<th>Valor del equipo (Euros)</th>";
        $lista.="<td>{$resultado['0']['4']}</td>";
        $lista .= "<td><a href='?id={$resultado['0']['0']}&atributo={$resultado['0']['4']}' title='Seleccionar atributo'><img src='presentacion/imagenes/update.png'></a></td>";
        $lista.="</tr>";
        $lista.="<tr>";
        $lista.="<th>Titulos del equipo</td>";
        $lista.="<td>{$resultado['0']['5']}</th>";
        $lista.= "<td><a href='?id={$resultado['0']['0']}&atributo={$resultado['0']['5']}' title='Seleccionar atributo'><img src='presentacion/imagenes/update.png'></a></td>";
        $lista.="</tr>";
        $lista.="<tr>";
        $lista.="<th>Jugador mas valioso (Euros)</th>";
        $lista.="<td>{$resultado['0']['6']}</td>";
        $lista.= "<td><a href='?id={$resultado['0']['0']}&atributo={$resultado['0']['6']}' title='Seleccionar atributo'><img src='presentacion/imagenes/update.png'></a></td>";
        $lista.="</tr>";
    //}
}
/*
$cadenaSQL = "select * from carta where id=$cartasJugador1[8]";//select de la carta que se muestra segun el id

$lista2= '';
$resultado = conectorBD::ejecutarQuery($cadenaSQL);
//print_r($resultado);
//print_r($resultado['0']['1']);
$lista2.= '<tr>';
$lista2.= "<th colspan='3'>{$resultado['0']['0']}</th>";
$lista2.= '</tr>';
$lista2.= '<tr>';
$lista2.= "<td colspan='3' align='center'><img src='presentacion/imagenes/logos/{$resultado['0']['3']}' width='200' height='200'/></td>";
$lista2.= '</tr>';
$lista2.= '<tr>';
$lista2.= "<td colspan='3'>{$resultado['0']['2']}</td>";
$lista2.= '</tr>';
$lista2.="<tr>";
$lista2.="<th>Valor del equipo (Euros)</th>";
$lista2.="<td>{$resultado['0']['4']}</td>";
$lista2.= "<td><a href='?id={$resultado['0']['0']}&atributo={$resultado['0']['4']}' title='Seleccionar atributo'><img src='presentacion/imagenes/update.png'></a></td>";
$lista2.="</tr>";
$lista2.="<tr>";
$lista2.="<th>Titulos del equipo</td>";
$lista2.="<td>{$resultado['0']['5']}</th>";
$lista2.= "<td><a href='?id={$resultado['0']['0']}&atributo={$resultado['0']['5']}' title='Seleccionar atributo'><img src='presentacion/imagenes/update.png'></a></td>";
$lista2.="</tr>";
$lista2.="<tr>";
$lista2.="<th>Jugador mas valioso (Euros)</th>";
$lista2.="<td>{$resultado['0']['6']}</td>";
$lista2.= "<td><a href='?id={$resultado['0']['0']}&atributo={$resultado['0']['6']}' title='Seleccionar atributo'><img src='presentacion/imagenes/update.png'></a></td>";
$lista2.="</tr>";

$cadenaSQL = "select * from carta where id=$cartasJugador2[16]";//select de la carta que se muestra segun el id

$lista3= '';
$resultado = conectorBD::ejecutarQuery($cadenaSQL);
//print_r($resultado);
//print_r($resultado['0']['1']);
$lista3.= '<tr>';
$lista3.= "<th colspan='3'>{$resultado['0']['0']}</th>";
$lista3.= '</tr>';
$lista3.= '<tr>';
$lista3.= "<td colspan='3' align='center'><img src='presentacion/imagenes/logos/{$resultado['0']['3']}' width='200' height='200'/></td>";
$lista3.= '</tr>';
$lista3.= '<tr>';
$lista3.= "<td colspan='3'>{$resultado['0']['2']}</td>";
$lista3.= '</tr>';
$lista3.="<tr>";
$lista3.="<th>Valor del equipo (Euros)</th>";
$lista3.="<td>{$resultado['0']['4']}</td>";
$lista3.= "<td><a href='?id={$resultado['0']['0']}&atributo={$resultado['0']['4']}' title='Seleccionar atributo'><img src='presentacion/imagenes/update.png'></a></td>";
$lista3.="</tr>";
$lista3.="<tr>";
$lista3.="<th>Titulos del equipo</td>";
$lista3.="<td>{$resultado['0']['5']}</th>";
$lista3.= "<td><a href='?id={$resultado['0']['0']}&atributo={$resultado['0']['5']}' title='Seleccionar atributo'><img src='presentacion/imagenes/update.png'></a></td>";
$lista3.="</tr>";
$lista3.="<tr>";
$lista3.="<th>Jugador mas valioso (Euros)</th>";
$lista3.="<td>{$resultado['0']['6']}</td>";
$lista3.= "<td><a href='?id={$resultado['0']['0']}&atributo={$resultado['0']['6']}' title='Seleccionar atributo'><img src='presentacion/imagenes/update.png'></a></td>";
$lista3.="</tr>";

$cadenaSQL = "select * from carta where id=$cartasJugador3[24]";//select de la carta que se muestra segun el id

$lista4= '';
$resultado = conectorBD::ejecutarQuery($cadenaSQL);
//print_r($resultado);
//print_r($resultado['0']['1']);
$lista4.= '<tr>';
$lista4.= "<th colspan='3'>{$resultado['0']['0']}</th>";
$lista4.= '</tr>';
$lista4.= '<tr>';
$lista4.= "<td colspan='3' align='center'><img src='presentacion/imagenes/logos/{$resultado['0']['3']}' width='200' height='200'/></td>";
$lista4.= '</tr>';
$lista4.= '<tr>';
$lista4.= "<td colspan='3'>{$resultado['0']['2']}</td>";
$lista4.= '</tr>';
$lista4.="<tr>";
$lista4.="<th>Valor del equipo (Euros)</th>";
$lista4.="<td>{$resultado['0']['4']}</td>";
$lista4.= "<td><a href='?id={$resultado['0']['0']}&atributo={$resultado['0']['4']}' title='Seleccionar atributo'><img src='presentacion/imagenes/update.png'></a></td>";
$lista4.="</tr>";
$lista4.="<tr>";
$lista4.="<th>Titulos del equipo</td>";
$lista4.="<td>{$resultado['0']['5']}</th>";
$lista4.= "<td><a href='?id={$resultado['0']['0']}&atributo={$resultado['0']['5']}' title='Seleccionar atributo'><img src='presentacion/imagenes/update.png'></a></td>";
$lista4.="</tr>";
$lista4.="<tr>";
$lista4.="<th>Jugador mas valioso (Euros)</th>";
$lista4.="<td>{$resultado['0']['6']}</td>";
$lista4.= "<td><a href='?id={$resultado['0']['0']}&atributo={$resultado['0']['6']}' title='Seleccionar atributo'><img src='presentacion/imagenes/update.png'></a></td>";
$lista4.="</tr>";
*/
?>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h3>JUEGO EN PROGRESO</h3>
    <div class="container-fluid">
    <br>
    	<div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                        <div class="card align-items-center">
                        <h3>Jugador 1</h3><img src="presentacion/imagenes/usuario1.png" class="rounded" width="200px" height="200px">
                        <img src="presentacion/imagenes/carta.png" width="50px" height="50px">X cartas
                        </div>
                </div>
                <div class="col-md-4">
                        <div>
                        <table class="table table-bordered">
                        <?=$lista?>
                        </table>
                        </div>
                </div>
                <div class="col-md-4">
                        <div>
                        <table class="table table-bordered">
                        <?=$lista?>
                        </table>
                        </div>
                </div>
                <div class="col-md-2">
                        <div class="card align-items-center">
                        <h3>Jugador 2</h3>
                        <img src="presentacion/imagenes/usuario2.png" class="rounded" width="200px" height="200px">
                        <img src="presentacion/imagenes/carta.png" width="50px" height="50px">X cartas
                        </div>
                </div>
            </div>
    	</div>    
    	<br>
    	<div class="container-fluid">
            <div class="row">
            	<div class="col-md-2">
                	<div class="card align-items-center">
                    	<h3>Jugador 3</h3><img src="presentacion/imagenes/usuario3.png" class="rounded" width="200px" height="200px">
                    	<img src="presentacion/imagenes/carta.png" width="50px" height="50px">X cartas
                	</div>
            	</div>
            	<div class="col-md-4">
                	<div>
                    	<table class="table table-bordered">
                    	<?=$lista?>
                    	</table>
                	</div>
            	</div>
            	<div class="col-md-4">
                	<div>
                    	<table class="table table-bordered">
                    	<?=$lista?>
                    	</table>
                	</div>
            	</div>
            	<div class="col-md-2">
                	<div class="card align-items-center">
                	<h3>Jugador 4</h3>
                	<img src="presentacion/imagenes/usuario4.png" class="rounded" width="200px" height="200px">
                	<img src="presentacion/imagenes/carta.png" width="50px" height="50px">X cartas
                	</div>
            	</div>
            </div>
    	</div>    
   	 
	</div>





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
