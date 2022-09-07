<?php
?>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<?php
//require_once './principal.php';
session_start();
echo session_id();


//session_unset();
//session_destroy();
$mensaje='';
if (isset($_REQUEST['mensaje'])) $mensaje=$_REQUEST['mensaje'];

?>
<html>
    <head>
        <meta charset="utf-8">        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">    
        <title></title>
    </head>
    <body style="background-color: #c1e8f7;">
      <div class="container py-5 h-100 ">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card bg-dark text-white" style="border-radius: 1rem;">
              <div class="card-body p-5 text-center">

                <div class="mb-md-5 mt-md-4 pb-5">
                <p><font color='red' ><?= $mensaje ?></font></p>  
                <form name="formulario" method='post' action='principal.php?CONTENIDO=presentacion/configuracion/cartas.php'>
                    <h1 class="fw-bold mb-2 text-uppercase">Siigo Match Battle</h1>
                    
                    <h4>Ingrese código de partida:</h4><br><br>

                    <div class="form-outline form-white">
                        <input type="text" id="nombre" name="sessionId" class="form-control form-control-lg" />
                    </div><br>
                  
                    <!--
                    <div class="form-outline form-white">
                        <input type="password" id="clave" name="clave" class="form-control form-control-lg" />
                        <label class="form-label" for="clave">Clave</label>
                    </div><br>
                    -->
                    <button class="btn btn-outline-light btn-lg px-5" type="submit">Entrar</button>
                    <div></div><br>
                    </form>
                <div>
                    <form name="formulario" method='post' action='principal.php?CONTENIDO=inicioJuego.php'>
                        <button class="btn btn-outline-light btn-lg px-5" type="submit">Crear partida</button>
                    </form>
                </div>

              </div>
            </div>
          </div>
        </div>    
      </div>
    </body>
</html>