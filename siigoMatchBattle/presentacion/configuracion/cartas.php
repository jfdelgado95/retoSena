<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
//require_once '../../logica/clasesGenericas/conectorBD.php';


$jugadores=$_REQUEST['jugadores'];
$cartas=32/$jugadores;

$arrayID= array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31);
shuffle($arrayID);
//Se mezcla y se reparte la baraja en los jugadores
$barajaRepartida = array_chunk($arrayID,floor($cartas), true);

for ($n = 0; $n < $jugadores; $n++) {
    ${"cartasJugador".$n}= $barajaRepartida[$n];
    print_r(${"cartasJugador".$n});
    echo '<br>';
}
$cadenaSQL = "select * from carta where id=$cartasJugador0[0]";//select de la carta que se muestra segun el id

$lista = '';
$resultado = conectorBD::ejecutarQuery($cadenaSQL);
//print_r($resultado);
//print_r($resultado['0']['1']);
$lista.= '<tr>';
$lista.= "<th colspan='3'>{$resultado['0']['0']}</th>";
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

?>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
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
                        <?=$lista2?>
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
                    	<?=$lista3?>
                    	</table>
                	</div>
            	</div>
            	<div class="col-md-4">
                	<div>
                    	<table class="table table-bordered">
                    	<?=$lista4?>
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
