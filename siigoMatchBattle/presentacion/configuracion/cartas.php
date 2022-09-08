<?php
// Creacion de la conexon
$servername = "localhost";
$username = "adsi";
$password = "utilizar";
$dbname = "siigomatchbattle";

$conn = new mysqli($servername, $username, $password, $dbname);
// Verificacion de la conexion
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//Fin conexion


function jugarRonda($item, $jugadores){
    $valor= array();
    for ($j = 0; $j < $jugadores; $j++) {
        $cadenaSQL= "select valor from carta where id='".${"cartasJugador".$j}[0]."'";
        $result= $conn->query($cadenaSQL);
        //echo $cadenaSQL;

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                array_push($valor, $row["valor"]);
            }
        } 
    }

    //print_r ($valor);
    
    $gana= array_search(max($valor), $valor);
   //echo "<br>gana".$gana;
    
    for ($j = 0; $j < $jugadores; $j++) {
        if($j!=$gana){
           array_push(${"cartasJugador".$gana}, ${"cartasJugador".$j}[0]); 
           unset(${"cartasJugador".$j}[0]);
        }
    }
} 


$codigoPartida= $_REQUEST['codigo'];
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
if ($bandera=false){
    for ($j = 0; $j < $jugadores; $j++) {
        for ($i = 0; $i < $cartas; $i++) {
            if(${"cartasJugador".$j}[$i]==$cartaInicio){
                $bandera=true;
                //echo "Debe comenzar el jugador".$j+1;
                $cartaInicio++;
            }
        }
    }
}
//Fin codigo para determinar quien comienza a jugar

$valor= array();
for ($j = 0; $j < $jugadores; $j++) {
    $cadenaSQL= "select valor from carta where id='".${"cartasJugador".$j}[0]."'";
    $result= $conn->query($cadenaSQL);
    //echo $cadenaSQL;

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          array_push($valor, $row["valor"]);
        //$valor. = $row["valor"];
        //echo "Código: ".$row["ca_codJugador"]." - Jugadores: ".$row["ca_numJugador"]."<br>";
      }
    } 
    
}

$lista = '';
for ($i = 0; $i < $jugadores; $i++) {
    $cadenaSQL = "select * from carta where id='$cartasJugador0[0]'";//select de la carta que se muestra segun el id
    $resultado = conectorBD::ejecutarQuery($cadenaSQL);
    //print_r($resultado[0]);
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
}

?>
<head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body onload="timer()">   
       	 
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

