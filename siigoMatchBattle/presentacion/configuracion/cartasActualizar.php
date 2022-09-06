<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
require_once '../../logica/clases/Carta.php';
require_once '../../logica/clasesGenericas/conectorBD.php';
//@session_start();
//if (!isset($_SESSION['usuario'])) header('location: ../../index.php?mensaje=Acceso no autorizado'); //Validación de seguridad

$imagen= new Carta(null, null);
switch ($_REQUEST['accion']){
    case 'Adicionar':
        
        //Procedimiento para subir el archivo        
        $nombreArchivo=$_REQUEST['nombre'].'_'.$_REQUEST['id'];
        $ruta='presentacion/imagenes/';
        $extension= substr($_FILES['imagen']['name'], strrpos($_FILES['imagen']['name'], '.'));//Esta línea obtiene la extensión del archivo
        move_uploaded_file($_FILES['imagen']['tmp_name'], "$ruta/logos/$nombreArchivo$extension");
        //Fin subir el archivo
        $imagen->setId($_REQUEST['id']);
        $imagen->setNombre($_REQUEST['nombre']);
        $imagen->setImagen($nombreArchivo . $extension);
        $imagen->setValor($_REQUEST['valor']);
        $imagen->setTitulo($_REQUEST['titulo']);
        $imagen->setJugador($_REQUEST['jugador']);
        $imagen->guardar();
        break;
    case 'Modificar':
        //Procedimiento para subir el archivo        
        $nombreArchivo=$_REQUEST['nombre'].'_'.$_REQUEST['id'];
        $ruta='presentacion/imagenes/';
        $extension= substr($_FILES['imagen']['name'], strrpos($_FILES['imagen']['name'], '.'));//Esta línea obtiene la extensión del archivo
        move_uploaded_file($_FILES['imagen']['tmp_name'], "$ruta/logos/$nombreArchivo$extension");
        //Fin subir el archivo
        $imagen->setId($_REQUEST['id']);
        $imagen->setNombre($_REQUEST['nombre']);
        $imagen->setImagen($nombreArchivo . $extension);
        $imagen->setValor($_REQUEST['valor']);
        $imagen->setTitulo($_REQUEST['titulo']);
        $imagen->setJugador($_REQUEST['jugador']);
        $imagen->modificar();
        break;
    case 'Eliminar':
        $imagen->setId($_REQUEST['id']);
        $imagen->eliminar();
        break;
}
//header('location: cartas.php');
?>
