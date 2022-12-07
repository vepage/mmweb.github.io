<?php
$accion='';

include 'funcionesSugerencias.php';
include 'getSug.php';

if (isset($_GET['submit'])) {
	$idSugerencia= $_GET['idSugerencia'];
	echo $idSugerencia;

	$estadoS = $_GET['estadoSug'];
	echo $estadoS;


	$user="root";
	$pass="";
	$server="localhost";
	$db="mmweb";
	$con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());
	$sql = "UPDATE `sugerencias` SET `estado`='$estadoS' WHERE `idSugerencia`=$idSugerencia";
	$con->query($sql) ? header("location: VerSugerencias.php?res=destacado") : header("location: VerSugerencias.php?res=error");

}//fin if

$user="root";
$pass="";
$server="localhost";
$db="mmweb";
$con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());
$sql = "SELECT * FROM `sugerencias` WHERE `idSugerencia`=$idSugerencia";
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
				<a href="VerSugerencias.php" class="a">Volver</a>
				</div>
				<div class="contenedorTabla">
				<table class="tabla">
					<thead>
						<tr>
							<th>No.Sugerencia</th>
							<th>Evento</th>
              <th>Sugerencia</th>
							<th>Estado</th>
							<th>Cliente</th>
						</tr>
					</thead>
					<tbody class="tablab">
						<?php while($row = $result->fetch_array(MYSQLI_ASSOC)) { ?>
							<tr align="center">
                <form action="DestacarS.php" method="get">
                  <td> <input type="text" name="" value="<?php echo $row['idSugerencia']; ?>" readonly></td>
  								<td> <input type="text" name="" value="<?php echo $row['idEvento']; ?>" readonly> </td>
  								<td> <input type="text" name="" value="<?php echo $row['descripcion']; ?>" readonly > </td>
                  <td> <select name="estadoSug" required>
												<option>Destacada</option>
												<option>Sin destacar</option>
									</select></td>
  								<td> <input type="text" name="" value="<?php echo $row['idCliente']; ?>" readonly> </td>
									<input type="hidden" name="accion" value="<?php echo $accion; ?>" >
									<input type="hidden" name="idSugerencia" value="<?php echo $row['idSugerencia']; ?>">
									<td> <button type="submit" name="submit" class="fa fa-check-square"></td>
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
