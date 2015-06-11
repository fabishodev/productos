

<?php
$id = intval($_GET['id']);
include("mysql.php"); 
$sql = "SELECT * FROM productos WHERE id_producto = '".$id."'";
//$sql="SELECT * FROM productos WHERE id_producto = 2";
$result = mysqli_query($con,$sql);
echo "<table class='table'>
<tr>
<th>Descripción</th>
<th>Imagen</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['descripcion'] . "</td>";
    echo "<td><img height='300' width='300' class='img-thumbnail' src='./". $row['ruta'] ."'></td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
