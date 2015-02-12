<?php 
	include_once 'includes/conexionT.php'; //INCLUYO ARCHIVO DE CONEXIÓN//----- Acordate Juan... crear la carpeta include para los archivos php 'includes/conexionT.php'
	$query = "SELECT * FROM cursos ORDER BY idCurso ASC";//SELECT nombre
	$resultQuery = mysqli_query($con,$query);
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="consultaMateria.php" method= "post">
<select name="materia">
	<?php
	while ($row = mysqli_fetch_array($resultQuery)){
		echo "<option value='".$row['idcurso']."'>".$row['nombreCurso'] ."</option>";
		
	}
	echo "<p>hola></p>";

	?>

</select>
	<input type="submit" value="Enviar">
</form>

</body>
</html>