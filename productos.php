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
						<h1>Productos <small></small></h1>
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
						$sql = "SELECT id_categoria,nombre_categoria FROM categorias where id_categoria != 0"; //Selecciona los titulos del menu -->
						$result = mysqli_query($con,$sql);
						while($menu = mysqli_fetch_row($result)) {
							echo "<div class='panel-group' id='accordion' role='tablist' aria-multiselectable='true'>
							  <div class='panel panel-default'>
							    <div class='panel-heading' role='tab' id='heading".$menu[0]."'>
							      <h4 class='panel-title'>
							        <a data-toggle='collapse' data-parent='#accordion' href='#collapse".$menu[0]."' aria-expanded='true' aria-controls='collapse".$menu[0]."'>
											";echo $menu[1];
							        echo "</a>
							      </h4>
							    </div>
							    <div id='collapse".$menu[0]."' class='panel-collapse collapse out' role='tabpanel' aria-labelledby='heading".$menu[0]."'>
							      <div class='panel-body'>";
										$sql_submenu = "SELECT id_producto,producto,categoria FROM productos WHERE categoria = '".$menu[0]."'";
										$result_submenu = mysqli_query($con,$sql_submenu);
										if (mysqli_num_rows($result_submenu) > 0) {
											echo "<div><ul>";
											while($submenu = mysqli_fetch_row($result_submenu)) {
												echo "<li><a onclick='getProduct(".$submenu[0].")' href='#'>".$submenu[1]." </a></li>";
											}
											echo "</ul></div>";
										}
							      echo "</div>
							    </div>
							  </div>
							</div>";





						}

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
