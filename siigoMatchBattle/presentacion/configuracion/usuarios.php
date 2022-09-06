<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

@session_start();
if (!isset($_SESSION['usuario'])) header('location: ../../index.php?mensaje=Acceso no autorizado'); //Validación de seguridad


$USUARIO= unserialize($_SESSION['usuario']);
$visitante= new Usuario('id', $USUARIO->getId());
require_once '../../logica/clases/Usuario.php';


$lista='';
$resultado= Usuario::getListaEnObjetos(null, "id");
for ($i = 0; $i < count($resultado); $i++) {
    $usuario=$resultado[$i];
    $lista.="<tr>";    
    $lista.="<td>{$usuario->getNombre()}</td>";
    $lista.="<td>{$usuario->getTipoUsuarioEnObejto()}</td>";
    //Condicional para que solo el administrador pueda modificar o eliminar usuarios
    if ($USUARIO->getTipoUsuario()=='A'){
    $lista.="<td>";
        $lista.="<a href='principal.php?CONTENIDO=presentacion/configuracion/usuariosFormulario.php&accion=Modificar&id={$usuario->getId()}' title='Modificar'><img src='presentacion/imagenes/update.png'></a>";
        $lista.="<img src='presentacion/imagenes/delete.png' onClick='eliminar({$usuario->getId()})' title='Eliminar'>";
    $lista.="</td>";
    }
    $lista.="</tr>";
}
?>

<h3 align="center">USUARIOS REGISTRADOS</h3>
<p></p>
<table border="1" align="center">
    <tr>
        <th>Nombre</th><th>Tipo Usuario</th><th><a href="principal.php?CONTENIDO=presentacion/configuracion/usuariosFormulario.php&accion=Adicionar" name="Adicionar"><img src='presentacion/imagenes/add.png' title='Adicionar usuario'></a></th>
    </tr>
    <?=$lista?>
</table>

<script type="text/javascript">
function eliminar(id){
    var respuesta=confirm("¿Está seguro de eliminar este registro?");
    if (respuesta)location="principal.php?CONTENIDO=presentacion/configuracion/usuariosActualizar.php&accion=Eliminar&id="+id;
}
</script>
