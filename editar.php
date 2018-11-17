<?php
	if (isset($_GET['editar'])) {
		$editar_id = $_GET['editar'];
		$consulta = "SELECT * FROM estudiante WHERE id='$editar_id'";
		$ejecutar = mysqli_query($con, $consulta);
		$fila =  mysqli_fetch_array($ejecutar);
		$usuario = $fila['nombre'];
		$apellido = $fila['apellido'];
		$telefono = $fila['telefono'];

	}
	

?>

<br/>
<form method="POST" action="">
	<input type="text" name="nombre" value="<?php echo $usuario; ?>"><br>
	<input type="text" name="apellido" value="<?php echo $apellido; ?>"><br>
	<input type="text" name="telefono" value="<?php echo $telefono; ?>"><br>
	<input type="submit" name="actualizar" value="actualizar Datos">
</form>

<?php
if (isset($_POST['actualizar'])) {
	 $actualizar_nombre =  $_POST['nombre'];	
	 $actualizar_apellido = $_POST['apellido'];
	 $actualizar_telefono = $_POST['telefono'];

	$actualizar = ("UPDATE estudiante SET nombre ='$actualizar_nombre', apellido ='$actualizar_apellido', telefono ='$actualizar_telefono' WHERE id='$editar_id'");
	//echo $actualizar;
	$ejecutar = mysqli_query($con, $actualizar);
	if ($ejecutar) {		
		echo "<script>alert('Dato actualizado')</script>";
		echo "<script>window.open('formulario.php','_self')</script>";
	}
}
	
?>