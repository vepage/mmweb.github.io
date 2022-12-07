<?php
$accion='buscar';
$res='';
$datos = array('Nombre'=>'', 'Apellido'=>'','Telefono'=>'','Clave'=>'', 'Correo_electronico'=>'', 'Id_Cliente'=>'');
include 'funciones.php';
include 'get.php';
?>
<html lang="es">
	<body>

		<div class="container">

			<div class="row">
				<a href="index.php" class="btn btn-primary">Nuevo Registro</a>

				<form action="post.php" method="POST">
					<b>Nombre: </b><input type="text" id="campo" name="campo" />
					<input type="hidden" name="accion" value="<?php echo $accion; ?>">
					<input type="submit" id="enviar" name="enviar" value="Buscar" class="btn btn-info" />
				</form>
			</div>

			<br>

			<div class="row table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nombre</th>
              <th>Apellido</th>
							<th>Telefono</th>
							<th>Email</th>
							<th>Clave</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php while($row = $datos->fetch_array(MYSQLI_ASSOC)) { ?>
							<tr>
								<td><input type="text" value="<?php echo $row['idCliente']; ?>" disabled></></td>
								<td><input type="text" value="<?php echo $row['nombre']; ?>" readonly></></td>
								<td><input type="text" value="<?php echo $row['apellido']; ?>" readonly></></td>
                <td><input type="text" value="<?php echo $row['noTelefono']; ?>" readonly></></td>
								<td><input type="text" value="<?php echo $row['correo']; ?>" readonly></></td>
                <td><input type="text" value="<?php echo $row['clave']; ?>" readonly></></td>
								<td><a href="Modificar.php?accion=editar&&idCliente=<?php echo $row['idCliente']; ?>"></span>Modificar</a></td>
								<td><a href="clientes.php?accion=eliminar&&idCliente=<?php echo $row['idCliente']; ?>"></span>Eliminar</a></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>

		<!-- Modal -->
		<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
          	<a href="menuCliente.html"><input type="submit" name="submit" value="Volver"></a>
				</div>
			</div>
		</div>

	</body>
</html>
