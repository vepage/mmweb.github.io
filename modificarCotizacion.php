<?php
$accion='';

include 'funcionesCotizacion.php';
include 'getCot.php';

$user="root";
$pass="";
$server="localhost";
$db="mmweb";
$con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());
$sql = "SELECT * FROM `cotizacion` WHERE `idCotizacion`=$idCotizacion";
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
										<script type="text/javascript">
				function confirmarModificar() {
					var respuesta = confirm("¿Desea modificar este elemento?");
					if(respuesta == true){
						return true;
					}else{
						return false;
					}
				}
			</script>
			<div class="row">
					<div class="busqueda">
							<a class="a"href="cotizaciones.php">Volver</a>
					</div>
				<table class="tabla">
					<thead>
						<tr>
							<th>ID</th>
							<th>Cotizacion</th>
              <th>Id Cliente</th>
						</tr>
					</thead>
					<tbody>
						<?php while($row = $result->fetch_array(MYSQLI_ASSOC)) { ?>
							<tr>
                <form action="postCotizacion.php" method="post" enctype="multipart/form-data">
                  <td><input type="text" name="idCotizacion" value="<?php echo $row['idCotizacion']; ?>" readonly></input></td>
  								<td><input type="file" value="<?php echo $row['cotizacion']; ?>" name="cotizacion" required></input></td>
                  <td><input type="text" name="idCliente" value="<?php echo $row['idCliente']; ?>" readonly></input></td>
									<input type="hidden" name="accion" value="<?php echo $accion; ?>">
  								<td><input type="submit" name="submit" value="Guardar" onclick="return confirmarModificar()"></input></td>
                </form>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>

	</body>
</html>
