<?

include_once 'includes/conexionT.php';

$id_curso = $_POST['materia'];
$id_usuario = $_POST['estudiante'];

$selectJoin = "SELECT * FROM usuarios
INNER JOIN nota_usuario ON usuario.idUsuario = nota_usuario.idUsuario
INNER JOIN nota         ON nota.idNota       = nota_usuario.idNota
INNER JOIN curso        ON curso.idCurso     = nota_usuario.idCurso WHERE curso,idCurso = $id_curso AND usuario.idUsuario=$id_usuario";

$resultQuery = mysqli_query($con,$selectJoin);
?>

<table border="1">
	 <tr>
	   <td>Nombre Nota</td>
	   <td>Nota</td> 
	   <td>Porcentaje nota</td>
	   <td>Total</td>
	 </tr>

	<?php

		$varAumento=0;
		$nombre;

		while ($row = mysqli_fetch_array($resultQuery)) {
			$nombre=$row['nombre']." ".$row['codigo'];
			$nombre_curso=$row['nombreCurso'];
				echo "
				  <tr>
				    <td>".$row['nombreNota']."</td>
				    <td>".$row['float']."</td> 
				    <td>".$row['porcentaje']."</td>
				    <td>".$row['float'] * $row['porcentaje']."</td>
				  </tr>
				";
			$varAumento++;
			$arrayNota[$varAumento]=$row['float'] * $row['porcentaje'];
		}
	?>
</table>

<?php 
	echo $nombre_curso.":";
	echo$arrayNota[1]+$arrayNota[2];
	echo "</br>";
	echo  $nombre;
?>