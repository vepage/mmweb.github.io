<?php
$accion='';

include 'funcionesCotizacion.php';
include 'getCot.php';
if (isset($_GET['Guardar'])) {
  $idCotizacion=$_GET['idCotizacion'];
  $Tipo=$_GET['Tipo'];
  $Ubicacion=$_GET['Ubicacion'];
  $Fecha=$_GET['Fecha'];

  $user="root";
  $pass="";
  $server="localhost";
  $db="mmweb";
  $con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());
  $sql = "INSERT INTO evento(tipo,fecha,ubicacion,idCotizacion) values ('$Tipo','$Fecha','$Ubicacion','$idCotizacion')";
  $result = $con->query($sql);
  header("location: cotizaciones.php?res=EventoAgregado");

}else{
  $idCotizacion=$_GET['idCotizacion'];
  $idCliente=$_GET['idCliente'];

  $user="root";
  $pass="";
  $server="localhost";
  $db="mmweb";
  $con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());
  $sql2 = "SELECT idCotizacion FROM evento where idCotizacion = '$idCotizacion'";
  $result2 = $con->query($sql2);

  while($row2 = $result2->fetch_array(MYSQLI_ASSOC)) {
    if ($row2['idCotizacion']==$idCotizacion) {
      header("location: EditarEvento.php?accion=evento&&idCotizacion=$idCotizacion&&idCliente=$idCliente");
    }
  }
  $user="root";
  $pass="";
  $server="localhost";
  $db="mmweb";
  $con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());
  $sql = "SELECT c.idCotizacion,c.cotizacion,c.idCliente,cl.nombre,cl.apellido FROM cotizacion c
          inner join cliente cl on cl.idCliente = c.idCliente  WHERE `idCotizacion`=$idCotizacion";
  $result = $con->query($sql);
}
?>
<html lang="es">
	<body>

		<div class="container">

			<br>
			<script type="text/javascript">
				function confirmarInsertar() {
					var respuesta = confirm("¿Desea insertar este evento?");
					if(respuesta == true){
						return true;
					}else{
						return false;
					}
				}
			</script>
			<div class="row table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>ID</th>
							<th>Cotizacion</th>
              <th>Id Cliente</th>
              <th>Nombre</th>
              <th>Apellido</th>
							<th>Tipo</th>
              <th>Fecha</th>
              <th>Ubicación</th>
              <th></th>
						</tr>
					</thead>
					<tbody>
						<?php while($row = $result->fetch_array(MYSQLI_ASSOC)) { ?>
							<tr>

                <form action="evento.php" method="get" enctype="multipart/form-data">
                  <td><input type="text" name="idCotizacion" value="<?php echo $row['idCotizacion']; ?>" readonly></input></td>
                  <td><input type="text" value="<?php echo $row['cotizacion']; ?>" name="cotizacion" readonly></input></td>
                  <td><input type="text" name="idCliente" value="<?php echo $row['idCliente']; ?>" readonly></input></td>
                  <td><input type="text" name="nombre" value="<?php echo $row['nombre']; ?>" readonly></input></td>
                  <td><input type="text" name="apellido" value="<?php echo $row['apellido']; ?>" readonly></input></td>
                  <td><input type="text" name="Tipo" value="" required></input></td>
                  <td><input type="datetime-local" name="Fecha" value="" required></input></td>
                  <td><input type="text" name="Ubicacion" value="" required></input></td>
  								<td><input type="submit" name="Guardar" value="Guardar" onclick="return confirmarInsertar()"></input></td>
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
          	<a href="cotizaciones.php"><input type="submit" name="submit" value="Volver"></a>
				</div>
			</div>
		</div>

	</body>
</html>
