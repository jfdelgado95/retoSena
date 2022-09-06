<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
//echo $_REQUEST['id'];
//$USUARIO= unserialize($_SESSION['usuario']);
//require_once '../../logica/clases/Carta.php';
//require_once '../../logica/clasesGenericas/conectorBD.php';

$lista='';
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

$entrada = Carta::getArray();
$claves_aleatorias = array_rand($entrada[3],6);
print_r($claves_aleatorias);

?>





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

<img src='../imagenes/logos/{$cartas->getImagen()}' width='200' height='200'/>