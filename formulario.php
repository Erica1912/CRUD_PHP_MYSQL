<!DOCTYPE html>
<meta charset="utf-8">

<?php
	$con = mysqli_connect("localhost", "root", "", "colegio") or die("error en conexion");

?>

<html>
<head>
	<title>CRUD PHP</title>
</head>
<body>
	<form method="POST" action="formulario.php">
		<label>Nombre</label>
			<input type="text" name="nombre" placeholder="Nombre"><br/>
		<label>Apellido</label>
			<input type="text" name="apellido" placeholder="Apellido"><br/>
		<label>Telefono</label>
			<input type="text" name="telefono" placeholder="Telefono"><br/>
		<input type="submit" name="insert" value="INSERTAR DATOS">
	</form>

	<?php
		if (isset($_POST['insert'])) {
			$usuario = $_POST['nombre'];
			$apellido = $_POST['apellido'];
			$telefono = $_POST['telefono'];

			$insertar = "INSERT INTO estudiante(nombre, apellido, telefono) VALUES ('$usuario', '$apellido', '$telefono')";
			//echo $insertar;
			$ejecutar = mysqli_query($con, $insertar);
			if ($ejecutar) {
				echo "<h3>Insertado correctamente</h3>";
			}
		}
	?>

	<br/>
	<table width="150px">
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Telefono</th>
			<th>Editar</th>
			<th>Borrar</th>
		</tr>
		<?php
		$consulta = "SELECT * FROM estudiante";		
		$ejecutar = mysqli_query($con, $consulta);
		$i = 0;
		while ($fila = mysqli_fetch_array($ejecutar)) {
			$id = $fila['id'];
			$nombre = $fila['nombre'];
			$apellido = $fila['apellido'];
			$telefono = $fila['telefono'];

			$i++;
		?>
		<tr>
			<td><?php echo $id ?></td>
			<td><?php echo $nombre ?></td>
			<td><?php echo $apellido ?></td>
			<td><?php echo $telefono ?></td>
			<td><a href="formulario.php?editar=<?php echo $id ?>">Editar</a></td>
			<td><a href="formulario.php?borrar=<?php echo $id ?>">Borrar</a></td>
		</tr>
		<?php
			}
		?>

	</table>

	<?php
		if (isset($_GET['editar'])) {
			include('editar.php');
		}


		if (isset($_GET['borrar'])) {
			$borrar_id = $_GET['borrar'];
			$borrar = "DELETE FROM estudiante WHERE id= '$borrar_id'";
			echo $borrar;
			$ejecutar= mysqli_query($con, $borrar);
			if ($ejecutar) {
				echo "<script>alert('Dato Borrado')</script>";
				echo "<script>window.open('formulario.php','_self')</script>";
			}
		}
	?>
</body>
</html>