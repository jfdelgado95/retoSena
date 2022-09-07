<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
require_once '../logica/clasesGenericas/conectorBD.php';
require_once '../logica/clases/Usuario.php';

$nombre=$_REQUEST['nombre'];
$clave=$_REQUEST['clave'];
$nombre= Usuario::validar($nombre, $clave);
if ($nombre==null) header('location:../index.php?mensaje=Usuario o contraseña no válidos');
else {
    session_start();
    $_SESSION['nombre']= serialize($nombre);
    header('location: ../principal.php?CONTENIDO=inicioJuego.php');
}
?>