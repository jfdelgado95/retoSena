<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
require_once './logica/clases/Usuario.php';

@session_start();
if (!isset($_SESSION['usuario'])) header('location: ../../index.php?mensaje=Acceso no autorizado'); //Validación de seguridad
$usuario= Usuario::getListaEnObjetos(null, null);

?>
<center>    
    <h2>Bienvenido a SIIGO MATCH BATTLE!!</h2>
<table border="2">
    <tr>
        <td>
            <img src="presentacion/imagenes/logos/AtleticoMadrid.png">
        </td>
    </tr>
</table>
</center>