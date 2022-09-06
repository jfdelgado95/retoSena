<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

$titulo='Adicionar';
if (isset($_REQUEST['id'])) {
    $titulo = 'Modificar';
    $usuario = new Usuario('id', $_REQUEST['id']);
} else {
    $usuario = new Usuario(null, null);
}
?>

<h3><?= strtoupper($titulo) ?> USUARIO</h3>
<form name="formulario" method="post" action="principal.php?CONTENIDO=presentacion/configuracion/usuariosActualizar.php">
    <table border="0">
        
        <tr><th>Tipo Usuario</th><td><input type="radio" name="tipoUsuario" value="A">Administrador</td></tr>
        <tr><th></th><td><input type="radio" name="tipoUsuario" value="U">Usuario</td></tr>
        <tr><th>Nombre</th><td><input type="text" name="nombre" value="<?= $usuario->getNombres() ?>" required></td></tr>
        <tr><th>Clave</th><td><input type="password" name="clave" size="50" maxlength="32" value="<?= $usuario->getClave() ?>" required></td></tr>
    </table><p>
    <input type="hidden" name="id" value="<?= $usuario->getId()?>">
    <input type="submit" name="accion" value="<?= $titulo ?>"/>
</form>