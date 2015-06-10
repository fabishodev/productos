<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Productos</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="page-header">
						<h1>Productos <small>Subtext for header</small></h1>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-lg-6">		


					<div id="menu">
						<?php
						include("mysql.php"); //Incluimos los datos de la conexion de base de datos
						$menu_sql = mysql_query("SELECT id_categoria,nombre_categoria FROM categorias where id_categoria != 0"); //Selecciona los titulos del menu
						while($menu = mysql_fetch_row($menu_sql)) //Entregara los datos en forma de $menu[numero], empezando con el 0
						{  //Repetira el siguiente echo con todos los datos de la consulta
						echo '        <ul>
									<li>
												<a  href="#">'.$menu[1].'</a>'; //Se usa el '. .' para "pausar" el echo y mostrar una variable acompañada siempre por puntos.
												$submenu_sql = mysql_query("SELECT id_producto,producto,categoria FROM productos WHERE categoria = '".$menu[0]."'"); //Selecciona los subsmenu con la condición de mostrar en el menu que corresponda (Por id)
												if(mysql_num_rows($submenu_sql) > 0) //Si la cantidad de filas que muestra la consulta es mayor a 0 imprimiria lo siguiente ( echo )
												{
												echo '
												<div>
															<ul>';
																		while($submenu = mysql_fetch_row($submenu_sql))
																		{
																		echo '
																		<li><a onclick="getProduct('.$submenu[0].')" href="#">'.$submenu[1].' </a></li>';
																		}
																		mysql_free_result($submenu_sql); //Liberamos memoria para no saturar el servidor, si es muy visitado, pero siempre es mejor tomar precauciones :)
																		echo '
															</ul>
												</div>';
												}
												echo '
									</li>
						</ul>
						';
						}
						mysql_free_result($menu_sql); //Aqui tambien liberamos la memoria en la consulta del menu
						mysql_close(); //Cerramos la conexion a la db
						?>
					</div>
				</div>
				<div class="col-lg-6">
					<div id="content"></div>
				</div>
			</div>
		</div>
		
		
	</body>
</html>
<script>
function getProduct(str){
	$.ajax({
		type:"GET",
		url:"Products.php",
		data: {"id": str}
		}).done(function(data){
		
		$( "#content" ).html(data);
	});
			}

</script>