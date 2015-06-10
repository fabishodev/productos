<?php
	
	$bd_host = "localhost"; //localhost XD
	$bd_usuario = "root"; //usuario
	$bd_password = "root"; //contraseña
	$bd_base = "bolsagto_hip"; //Nombre de la db
	$con = mysql_connect($bd_host, $bd_usuario, $bd_password);
	mysql_select_db($bd_base, $con);	
?>