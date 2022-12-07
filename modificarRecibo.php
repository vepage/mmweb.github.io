<?php
$accion='';

include 'funcionesRecibo.php';
include 'getRecibo.php';

$user="root";
$pass="";
$server="localhost";
$db="mmweb";
$con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());
$sql = "SELECT * FROM `recibo` WHERE `idRecibo`=$idCotizacion";
$result = $con->query($sql);

?>
<html lang="es">
	<body>

		<div class="container">

			<br>

			<div class="row table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>ID</th>
							<th>Recibo</th>
              <th>Id Cliente</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php while($row = $result->fetch_array(MYSQLI_ASSOC)) { ?>
							<tr>
                <form action="postRecibo.php" method="post" enctype="multipart/form-data">
                  <td><input type="text" name="idRecibo" value="<?php echo $row['idRecibo']; ?>" readonly></input></td>
  								<td><input type="file" value="<?php echo $datos['Recibo']; ?>" name="Recibo" size="50000" required></input></td>
                  <td><input type="text" name="idCliente" value="<?php echo $row['idCliente']; ?>" readonly></input></td>
									<input type="hidden" name="accion" value="<?php echo $accion; ?>">
  								<td><input type="submit" name="submit" value="Guardar"></input></td>
                </form>
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
          	<a href="recibos.php"><input type="submit" name="submit" value="Volver"></a>
				</div>
			</div>
		</div>

	</body>
</html>
