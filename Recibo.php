<?php
//Esto hace que se conecte a la base de daots
$res='';
$datos = array('Recibo'=>'', 'idCliente'=>'','idRecibo'=>'');
$accion = 'insert';
include 'funcionesRecibo.php';

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
					<h1>Agregar Recibo</h1>
					<form action="postRecibo.php" method="post" style="white-space:pre-line;" enctype="multipart/form-data">
						Archivo de recibo
						<input type="file" value="<?php echo $datos['Recibo']; ?>" name="recibo" size="50000" required>

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

					<input type="hidden" name="idRecibo" value="<?php  echo $datos['idRecibo']?>">

					<button type="submit" name="submit" value="Guardar" class="Guardar">Guardar</button>
					</form>
					<a href="MenuRecibo.php" class="a">Volver</a>
				</div>
		</div>

		<div class="contenedorTabla">
				<form class="" action="index.html" method="post">
					<label>Tabla clientes</label>
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
						 <table class="tabla" >
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
						 <h1>TABLA RECIBO</h1>
						 <?php
						 $user="root";
						 $pass="";
						 $server="localhost";
						 $db="mmweb";
						 $con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());
						 $sql = "SELECT * FROM `recibo` ORDER BY `idRecibo`";
						 $result = $con->query($sql);
							?>
						 <table class="tabla">
							 <thead>
								 <tr>
									 <th>idRecibo</th>
									 <th>Recibo</th>
									 <th>idCliente</th>
								 </tr>
							 </thead>
							 <tbody>
								 <?php while($row = $result->fetch_array(MYSQLI_ASSOC)) { ?>
									 <tr>
										 <td> <input type="text" name="" value="<?php echo $row['idRecibo']; ?>"> </td>
										 <td><a href="recibos.php"><button><?php echo $row['Recibo']; ?></button></a></td>
										 <td> <input type="text" name="" value="<?php echo $row['idCliente']; ?>"> </td>
										 <td><a href="recibos.php" class="icons" id="iconsBasura"><i class="fa fa-trash"></a></td>
										 <td><a href="recibos.php" class="icons" id="iconSMod"><i class="fa fa-gear"></a></td>
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
