<?php
include 'includes/conexionT.php';
$idMateria = $_POST['materia'];
//echo $idMateria;

$selectJoin = "SELECT usuario.idUsuario, usuario.nombre, usuario.codigo FROM usuario
			INNER JOIN usuario_curso ON usuario.idUsuario = usuario_curso.idUsuario
			INNER JOIN cursos            ON cursos.idcurso        = usuario_curso.idcurso WHERE cursos.idcurso=$idMateria";

		$resultQueryJoin = mysqli_query($con,$selectJoin);

		while ($row = mysqli_fetch_array($resultQueryJoin)) {
			echo "  
				<form action='notas.php' method='post'>
					<select name='usuario'>
						<option value='".$row['idUsuario']."'>".$row['idUsuario'] ."</option>
					</select>"
					
					." ".
					$row["nombre"]." ".$row["codigo"]
					." ".
				
					"<select name='materia'>
						<option value='".$idMateria."'>".$row['nombre'] ."</option>
					</select>"
					
					." ".
					
					"<input type='submit' value='Ver notas'>
				</form>
			"
			;
 		}
?>