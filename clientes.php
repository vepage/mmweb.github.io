<?php
$accion='buscar';
$res='';
$Nombre='';
$result='';
$datos = array('Nombre'=>'', 'Apellido'=>'','Telefono'=>'','Clave'=>'', 'Correo_electronico'=>'', 'Id_Cliente'=>'');
include 'funciones.php';
include 'get.php';
if(isset($_GET["Nombre"])){
	if($_GET["Nombre"]!=''){
		$user="root";
		$pass="";
		$server="localhost";
		$db="mmweb";
		$con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());
		$sql = "SELECT `idCliente`, `noTelefono`, `nombre`, `apellido`, `correo`, `clave` FROM `cliente` WHERE `nombre` LIKE '$_GET[Nombre]%';";
		$result = $con->query($sql);
	}else {

	}
}else {
	$user="root";
	$pass="";
	$server="localhost";
	$db="mmweb";
	$con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());
	$sql = "SELECT `idCliente`, `noTelefono`, `nombre`, `apellido`, `correo`, `clave` FROM `cliente` WHERE `nombre` LIKE '%';";
	$result = $con->query($sql);
}
?>


<?php // WARNING: COMIENZA EL HTML ?>
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
			<div class="row">
				<form action="post.php" method="POST">
					<div class="busqueda">
					<input type="hidden" name="accion" value="<?php echo $accion; ?>">
					<input type="hidden" name="Id_Cliente" value="<?php  echo $datos['Id_Cliente']?>">
					<input type="text" id="campo" name="Nombre" value="<?php echo $Nombre; ?>" />
					<button type="submit" id="enviar" name="submit" class="busqueda"> <i class="fa fa-search"></i> </button>
					<button type="button" name="button" class="fa fa-plus" id="add"> <a href="agregaCliente.php"></a> </button>
					<a href="menuCliente.php" class="a">Volver</a>
					</div>

				</form>

				<div class="contenedorTabla">
					<table class="tabla">
						<thead>
							<tr>
								<th>ID</th>
								<th>NOMBRE</th>
              	<th>APELLIDO</th>
								<th>TELÉFONO</th>
								<th>CORREO</th>
								<th>CLAVE</th>
							</tr>
						</thead>
					<tbody class="tablab">
						<?php while($row = $result->fetch_array(MYSQLI_ASSOC)) { ?>
							<tr>
								<td><input class="idC" type="text" value="<?php echo $row['idCliente']; ?>" disabled></></td>
								<td><input type="text" value="<?php echo $row['nombre']; ?>" readonly></></td>
								<td><input type="text" value="<?php echo $row['apellido']; ?>" readonly></></td>
                <td><input type="text" value="<?php echo $row['noTelefono']; ?>" readonly></></td>
								<td><input type="text" value="<?php echo $row['correo']; ?>" readonly></></td>
                <td><input type="text" value="<?php echo $row['clave']; ?>" readonly></></td>
								<td><a  class="icons" id="iconsMod" href="Modificar.php?accion=editar&&idCliente=<?php echo $row['idCliente']; ?>"> <i class="fa fa-gear"></i> </a></td>
								<td><a  class="icons" id="iconsBasura" href="clientes.php?accion=eliminar&&idCliente=<?php echo $row['idCliente']; ?>"> <i class="fa fa-trash"></i> </a></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
</div>



	</body>

</html>
