<?php
$accion='';
include 'funcionesSugerencias.php';
include 'getSug.php';

$user="root";
$pass="";
$server="localhost";
$db="mmweb";
$con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());
$sql = "SELECT `idSugerencia`, `idEvento`, `descripcion`, `estado`,`idCliente` FROM `sugerencias`";
$result = $con->query($sql);
?>
<html lang="es">
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="imagenes/designModificaElimina.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<meta charset="utf-8">

	<body>

		<div class="contenedor">
			<div class="row">
				<h2 align="center">SUGERENCIAS</h2>
				<div class="busqueda">
						<a href="menuAdmin.php" class="a">Volver</a>
				</div>
			<div class="contenedorTabla">
				<table class="tabla">
					<thead>
						<tr>
							<th>No. Sugerencia</th>
							<th>No. Evento</th>
              <th>Sugerencia</th>
              <th>Estado</th>
              <th>No. Cliente</th>
						</tr>
					</thead>

					<tbody class="tablab">
						<?php while($row = $result->fetch_array(MYSQLI_ASSOC)) { ?>
							<tr align="center">
								<td> <input type="text" name="" value="<?php echo $row['idSugerencia']; ?>" readonly> </td>
								<td> <input type="text" name="" value="<?php echo $row['idEvento']; ?>" readonly> </td>
                <td> <input type="text" name="" value="<?php echo $row['descripcion'] ?>" readonly> </td>
                <td> <input type="text" name="" value="<?php echo $row['estado'] ?>" readonly> </td>
                <td> <input type="text" name="" value="<?php echo $row['idCliente'] ?>" readonly> </td>
                <td> <a class="icons" id="iconsMod" href="DestacarS.php?accion=destacar&&idSugerencia=<?php echo $row['idSugerencia']; ?>"><i class="fa fa-bookmark"></i></a></td>
                <td> <a class="icons" id="iconsBasura" href="VerSugerencias.php?accion=eliminar&&idSugerencia=<?php echo $row['idSugerencia']; ?>"><i class="fa fa-trash"></i></a></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
				</div>

</div>
</body
