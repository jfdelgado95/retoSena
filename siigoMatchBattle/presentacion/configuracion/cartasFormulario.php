<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

//@session_start();
//if (!isset($_SESSION['usuario'])) header('location: ../../index.php?mensaje=Acceso no autorizado'); //Validación de seguridad
require_once '../../logica/clases/Carta.php';
require_once '../../logica/clasesGenericas/conectorBD.php';


$titulo='Adicionar';
if (isset($_REQUEST['id'])) {
    $titulo = 'Modificar';
    $cartas = new Carta('id', $_REQUEST['id']);
} else {
    $cartas = new Carta(null, null);
}

?>
<h3 align="center"><?= strtoupper($titulo) ?> CARTA</h3>

<center>
    <form name="formulario" method="post" action="cartasActualizar.php" enctype="multipart/form-data">
    <!-- Si se quiere subir archivos, obligatoriamente se debe colocar "enctype" en el formulario-->
    <table border="1">
        <tr>
            <td>
                <table border="1">
                    <tr><th colspan="2">Id</th><td><input type="text" name="id" size="50" maxlength="50" value="<?= $cartas->getId() ?>" required></td></tr>
                    <tr><th colspan="2">Nombre</th><td><input type="text" name="nombre" size="50" maxlength="50" value="<?= $cartas->getNombre() ?>" required></td></tr>
                    <tr><th colspan="2">Imagen</th><td><input type="file" name="imagen" value="<?= $cartas->getImagen() ?>" onchange="mostrarImagen()" required></td></tr>
                    <tr><th colspan="2">Valor Equipo</th><td><input type="text" name="valor" value="<?= $cartas->getValor() ?>" required></td></tr>
                    <tr><th colspan="2">Titulos</th><td><input type="text" name="titulo" value="<?= $cartas->getTitulo() ?>" required></td></tr>
                    <tr><th colspan="2">Jugador mas valioso</th><td><input type="text" name="jugador" value="<?= $cartas->getJugador() ?>" required></td></tr>
                </table>
            </td>
            <td><img src="presetacion/categorias/imagenes/<?= $cartas->getImagen() ?>" id="imagen" width="120" height="150"/></td> 
        </tr>
    </table><p></p>
    <input type="hidden" name="id" value="<?= $cartas->getId()?>"><!-- Se envia el id para el método de eliminar -->
    <input type="submit" name="accion" value="<?= $titulo ?>"/>
</form>
</center>

<!-- Esta función se utiliza para mostrar la imagen en el formulario de adicion de candidatos -->
<script type="text/javascript">
function mostrarImagen(){
    var lector=new FileReader();
    lector.readAsDataURL(document.formulario.imagen.files[0]);
    lector.onloadend = function (){
        document.getElementById("imagen").src=lector.result;
    };
}
</script>
