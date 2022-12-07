<?php
//Esto hace que se conecte a la base de daots
$res='';
$datos = array('EstatusCliente'=>'', 'idCliente'=>'','idEstatus'=>'');
$accion = 'insert';
include 'funcionesEstatus.php';

?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<title>MMWEB</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="imagenes/COTREC.css">
</head>
<body>

	<div class="contenedorGeneral">
			<div class="contenedorInsert">
					<div class="contenido">
						<h1>Agregar Estatus</h1>
						<form action="postEstatus.php" method="post" style="white-space:pre-line;" enctype="multipart/form-data">

						<label>Archivo de estatus</label>

							<input type="file" value="<?php echo $datos['EstatusCliente']; ?>" name="EstatusCliente" size="50000" required>

						<label>ID del Cliente:</label>
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

							<input type="hidden" name="idEstatus" value="<?php  echo $datos['idEstatus']?>">

							<button type="submit" name="submit" value="Guardar" class="Guardar">Guardar</button>
						</form>
							<a href="menuestatus.php" class="A">Volver</a>
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
						 <h1>TABLA RECIBOS</h1>
	 					<?php
	 					$user="root";
	 					$pass="";
	 					$server="localhost";
	 					$db="mmweb";
	 					$con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());
	 					$sql = "SELECT * FROM `estatus` ORDER BY `idEstatus`";
	 					$result = $con->query($sql);
	 					 ?>
	 					<table class="tabla" >
	 						<thead>
	 							<tr>
	 								<th>idEstatus</th>
	 								<th>Estatus</th>
	 								<th>idCliente</th>
	 							</tr>
	 						</thead>
	 						<tbody>
	 							<?php while($row = $result->fetch_array(MYSQLI_ASSOC)) { ?>
	 								<tr>
	 									<td> <input type="text" name="" value="<?php echo $row['idEstatus']; ?>"> </td>
	 									<td><a href="MEstatus.php"><button><?php echo $row['EstatusCliente']; ?></button></a></td>
	 									<td> <input type="text" name="" value="<?php echo $row['idCliente']; ?>"> </td>
	 									<td><a href="MEstatus.php" class="icons" id="iconsBasura"><i class="fa fa-trash"></a></td>
	 									<td><a href="MEstatus.php" class="icons" id="iconsMod"><i class="fa fa-gear"></a></td>
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
