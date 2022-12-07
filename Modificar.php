<?php
$accion='';

include 'funciones.php';
include 'get.php';

$user="root";
$pass="";
$server="localhost";
$db="mmweb";
$con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());
$sql = "SELECT * FROM `cliente` WHERE `idCliente`=$idCliente";
$result = $con->query($sql);

?>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>MMWEB</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="imagenes/designModificaElimina.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
	<body>
		<div class="contenedor">
			<div class="row">
					<div class="busqueda">
							<a href="Clientes.php" class="a" >Volver</a>
					</div>

				<div class="contenedorTabla">
					<table class="tabla">
						<thead>
							<tr>
								<th>ID</th>
								<th>NOMBRE</th>
								<th>APELLIDO</th>
								<th>TELÉFONO</th>
								<th>CORREO</th>
								<th>CLAVE</th>
							</tr>
						</thead>
						<tbody class="tablab">
							<?php while($row = $result->fetch_array(MYSQLI_ASSOC)) { ?>
								<tr>
									<form action="post.php" method="post">
										<td><input type="text" name="Id_Cliente" value="<?php echo $row['idCliente']; ?>" readonly></></td>
										<td><input type="text" name="Nombre" value="<?php echo $row['nombre']; ?>"></></td>
										<td><input type="text" name="Apellido" value="<?php echo $row['apellido']; ?>"></></td>
										<td><input type="text" name="Telefono" value="<?php echo $row['noTelefono']; ?>" maxlength="10"></></td>
										<td><input type="text" name="Correo_electronico" value="<?php echo $row['correo']; ?>"></></td>
										<td><input type="text" name="Clave" value="<?php echo $row['clave']; ?>" maxlength="10"></></td>
										<input type="hidden" name="accion" value="<?php echo $accion; ?>">
										<input type="hidden" name="Tipo" value="<?php echo $row['Tipo']; ?>">
										<td><input type="submit" name="submit" value="Guardar"></td>
									</form>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>

	</body>
</html>
