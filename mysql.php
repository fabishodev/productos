<?php

	$bd_host = "localhost"; //localhost XD
	$bd_usuario = "root"; //usuario
	$bd_password = "root"; //contraseña
	$bd_base = "bolsagto_hpi"; //Nombre de la db
	$con = mysqli_connect($bd_host, $bd_usuario, $bd_password, $bd_base);

	if (!$con) {
	    die('Could not connect: ' . mysqli_error($con));
	}

	mysqli_select_db($con,"ajax_demo");
?>
