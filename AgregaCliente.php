<?php
//Esto hace que se conecte a la base de daots
$accion = 'insert';
$res='';
if(isset($_GET["res"])){
	if($_GET["res"]=='registro'){
		$idContacto=$_GET["idContacto"];
		$user="root";
		$pass="";
		$server="localhost";
		$db="mmweb";
		$con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());
		$sql = "SELECT * FROM `contacto_previo` WHERE `idContacto`=$idContacto";
		$result = $con->query($sql);
		$row = $result->fetch_array(MYSQLI_ASSOC);
		$datos = array('Nombre'=>$row["nombre"], 'Apellido'=>'','Telefono'=>$row["noTelefono"],'Clave'=>'', 'Correo_electronico'=>$row["correo"], 'Id_Cliente'=>'');
	}
}else{$datos = array('Nombre'=>'', 'Apellido'=>'','Telefono'=>'','Clave'=>'', 'Correo_electronico'=>'', 'Id_Cliente'=>'');}
include 'funciones.php';
?>

<?php // WARNING: AQUÍ COMIENZA EL DISEÑO ?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8">
	<title>MMWEB</title>
	<script type="text/javascript" src="D:\XAMPP\htdocs\MMWEB\Registro\Funciones.js"></script>
	<link rel="stylesheet" href="imagenes/disenoAgregaCliente.css">
</head>
<body>

	<div class="contenedor">

			<div class="formulario">

				<div class="titulo">
						Agregar cliente
				</div>

				<form action="post.php" method="post">

					<div class="entradas">
						Nombre:
						<input type="text" value="<?php echo $datos["Nombre"] ?>" name="Nombre" requiered>
					</div>

					<div class="entradas">
					Apellido Paterno:
					<input type="text" value="<?php echo $datos['Apellido']; ?>" name="Apellido">
			  	</div>

					<div class="entradas">
					Teléfono:
					<input type="text" value="<?php echo $datos["Telefono"]; ?>" name="Telefono" maxlength="10" requiered>
					</div>

					<div class="entradas">
					Clave:
					<input type="text" value="<?php echo $datos['Clave']; ?>" name="Clave" maxlength="10" requiered>
					</div>

					<div class="entradas">
					Correo:
					<input type="text" value="<?php echo $datos["Correo_electronico"] ?>" name="Correo_electronico" requiered>
					</div>

					<div class="entradas">
						<input type="hidden" name="accion" value="<?php echo $accion; ?>">

						<input type="hidden" name="Id_Cliente" value="<?php  echo $datos['Id_Cliente']?>">

						<input type="submit" name="submit" value="Guardar" class="guardar">
					</div>

				</form>
				
						<a href="menuCliente.php">Volver</a>

			</div>



	</div>

</body>
</html>
