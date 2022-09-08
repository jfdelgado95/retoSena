<?php

session_start();

//Codigo para generar el codigo de la partida
$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
 
function generarCodigoPartida($input, $strength = 16) {
	$input_length = strlen($input);
	$random_string = '';
	for($i = 0; $i < $strength; $i++) {
    	$random_character = $input[mt_rand(0, $input_length - 1)];
    	$random_string .= $random_character;
	}
	return $random_string;
}
$codigoPartida= generarCodigoPartida($permitted_chars, 6);
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
            	<form name="formulario" method='post' action='principal.php?CONTENIDO=presentacion/configuracion/cartas.php'>
                	<h1 class="fw-bold mb-2 text-uppercase">Siigo Match Battle</h1>
               	 
                	<h4>Ingrese código de partida:</h4><br><br>

                	<div class="form-outline form-white">
                    	<input type="text" id="nombre" name="sesionId" value="" class="form-control form-control-lg" />
                   	 
                	</div><br>
                	<button class="btn btn-outline-light btn-lg px-5" type="submit">Entrar</button>
            	</form>
            	<div>
            	<form form="form-group" name="formulario" method='post' action='principal.php?CONTENIDO=inicioJuego.php'>
                	<select class="form-control" cols="48" name="jugadores" value="Numero de jugadores:">    
                    	<option value="2">2 jugadores</option>    
                    	<option value="3">3 jugadores</option>    
                    	<option value="4" selected>4 jugadores</option>    
                    	<option value="5">5 jugadores</option>    
                    	<option value="6">6 jugadores</option>
                    	<option value="7">7 jugadores</option>
                	</select>
                	<br>
                	<label><input type="label" class="form-control" name="codigoPartida" value="<?= $codigoPartida?>" size="50"></label>
                	<br>
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