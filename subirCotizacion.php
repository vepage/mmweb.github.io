<?php

$res='';
$datos = array('cotizacion'=>'', 'idCliente'=>'','idCotizacion'=>'','tipo'=>'','fecha'=>'','ubicacion'=>'');
$accion = 'insert';
include 'funcionesCotizacion.php';

?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<title>MMWEB</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="imagenes/COTREC.css">
	<script type="text/javascript"></script>
</head>
<body>

<div class="contenedorGeneral">
	<div class="contenedorInsert">
			<div class="contenido">
				<h1>Agregar Cotización</h1>
				<form action="postCotizacion.php" method="post" style="white-space:pre-line;" enctype="multipart/form-data">
					Archivo de cotización <br>
					<input type="file" value="<?php echo $datos['cotizacion']; ?>" name="cotizacion" size="50000" required>

						ID del Cliente:
									<?php
											$user="root";
											$pass="";
											$server="localhost";
											$db="mmweb";
											$con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());
											$sql = "SELECT `idCliente` FROM `cliente` WHERE `Tipo`!=1;";
											$result = $con->query($sql);
				 							?>
					<select name="idCliente" required>
						<?php while($row = $result->fetch_array(MYSQLI_ASSOC)) { ?>
								<option><?php echo $row['idCliente']; ?></option>
						<?php } ?>
					</select>
				<input type="hidden" name="accion" value="<?php echo $accion; ?>">

				<input type="hidden" name="idCotizacion" value="<?php  echo $datos['idCotizacion']?>">

				<button type="submit" name="submit" value="Guardar" class="Guardar">Guardar</button>
			</form>
			<a href="menuCotizacion.php" class="a">VOLVER</a>
			</div>
	</div>

	<div class="contenedorTabla">
		<form class="" action="index.html" method="post">
			<?php
			$user="root";
			$pass="";
			$server="localhost";
			$db="mmweb";
			$con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());
			$sql = "SELECT `idCliente`, `noTelefono`, `nombre`, `apellido`, `correo` FROM `cliente` where `idCliente` <> 27";
			$result = $con->query($sql);
			 ?>
			 <div class="tablaRelleno">
				 <h2>TABLA CLIENTES</h2>
				 <table class="tabla">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nombre</th>
							<th>Apellido</th>
							<th>Telefono</th>
							<th>Email</th>
						</tr>
					</thead>
					<tbody>
						<?php while($row = $result->fetch_array(MYSQLI_ASSOC)) { ?>
							<tr>
								<td> <input type="text" name="" value="<?php echo $row['idCliente']; ?>"> </td>
								<td> <input type="text" name="" value="<?php echo $row['nombre']; ?>"> </td>
								<td> <input type="text" name="" value="<?php echo $row['apellido']; ?>"> </td>
								<td> <input type="text" name="" value="<?php echo $row['noTelefono']; ?>"> </td>
								<td> <input type="text" name="" value="<?php echo $row['correo']; ?>"> </td>
								<td><a href="clientes.php" class="icons" id="iconsBasura"><i class="fa fa-trash"></i></a></td>
								<td><a href="clientes.php" class="icons" id="iconSMod"><i class="fa fa-gear"></a></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			 </div>

			 <div class="tablaRelleno">
				 <h2>TABLA COTIZACIONES</h2>
				 <?php
				 $user="root";
				 $pass="";
				 $server="localhost";
				 $db="mmweb";
				 $con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());
				 $sql = "SELECT c.idCotizacion,c.cotizacion,c.idCliente,cl.nombre,cl.apellido,cl.correo FROM cotizacion c
								 inner join cliente cl on cl.idCliente = c.idCliente";
				 $result = $con->query($sql);
					?>
				 <table class="tabla" >
					 <thead>
						 <tr>
							 <th>idCotizacion</th>
							 <th>Cotizacion</th>
							 <th>idCliente</th>
							 <th>Nombre</th>
							 <th>Apellido</th>
							 <th>Correo</th>
						 </tr>
					 </thead>
					 <tbody>
						 <?php while($row = $result->fetch_array(MYSQLI_ASSOC)) { ?>
							 <tr>
								 <td><input type="text" name="idCotizacion" value="<?php echo $row['idCotizacion']; ?>" readonly size="7"></input></td>
								 <td><input type="text" name="cotizacion" value="<?php echo $row['cotizacion']; ?>" readonly size="11"></input></td>
								 <td><input type="text" name="idCliente" value="<?php echo $row['idCliente']; ?>" readonly size="4"></input></td>
								 <td><input type="text" name="nombre" value="<?php echo $row['nombre']; ?>" readonly size="5"></input></td>
								 <td><input type="text" name="apellido" value="<?php echo $row['apellido']; ?>" readonly size="5"></input></td>
								 <td><input type="text" name="correo" value="<?php echo $row['correo']; ?>" readonly></input></td>
								 <tD><a class="icons" id="iconsBasura" href="cotizaciones.php"> <i class="fa fa-trash"> </a></tD>
								 <tD><a class="icons" id="iconsMod" href="cotizaciones.php"><i class="fa fa-gear"></a></tD>
								 <tD><a href="cotizaciones.php"><button type="button" class="AgregarE">Agregar Evento</button></a></tD>
							 </tr>
						 <?php } ?>
					 </tbody>
				 </table>
			 </div>
		</form>
	</div>

</div>

</body>
</html>
