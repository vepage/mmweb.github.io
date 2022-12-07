<?php
$accion='';
$datos = array('Nombre'=>'', 'Apellido'=>'','Telefono'=>'','Clave'=>'', 'Correo_electronico'=>'', 'Id_Cliente'=>'');
include 'funcionesContPrev.php';
include 'getContPrev.php';

$user="root";
$pass="";
$server="localhost";
$db="mmweb";
$con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());
$sql = "SELECT `idContacto`, `noTelefono`, `nombre`, `correo` FROM `contacto_previo`";
$result = $con->query($sql);
?>
<html lang="es">
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="imagenes/designModificaElimina.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
	<body>

		<div class="contenedor">
			<div class="row">

				<div class="busqueda">
						<a href="menuAdmin.php" class="a">Volver</a>
				</div>

				<table class="tabla">
					<thead>
						<tr>
							<th>ID CONTACTO</th>
							<th>NOMBRE</th>
							<th>TELÉFONO</th>
							<th>CORREO</th>
						</tr>
					</thead>

					<tbody>
						<?php while($row = $result->fetch_array(MYSQLI_ASSOC)) { ?>
							<tr>
								<td> <input type="text" name="" value="<?php echo $row['idContacto']; ?>"> </td>
								<td> <input type="text" name="" value="<?php echo $row['nombre']; ?>"> </td>
                <td> <input type="text" name="" value="<?php echo $row['noTelefono']; ?>"> </td>
								<td> <input type="text" name="" value="<?php echo $row['correo']; ?>"> </td>
								<td><a class="icons" href="visualizarContPrev.php?accion=eliminar&&idContacto=<?php echo $row['idContacto']; ?>" id="iconsBasura"><i class="fa fa-trash"></a></td>
								<td><a href="agregaCliente.php?res=registro&&idContacto=<?php echo $row['idContacto']; ?>" id="registrar">Registrar</a></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>

	</body>
</html>
