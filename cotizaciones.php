<?php
$accion='';
$res = '';
$idCliente = '';
$datos = array('cotizacion'=>'', 'idCliente'=>'','idCotizacion'=>'');
include 'funcionesCotizacion.php';
include 'getCot.php';
if(isset($_GET['res'])){
	if($_GET['res']=='Eliminado'){
		$idCliente=$_GET['idCliente'];
		array_map('unlink', glob("documentos/Cotizacion$idCliente.pdf"));
	}
}
if((isset($_GET['buscar']))) {
		$idCliente = $_GET['idCl'];
		$user="root";
    $pass="";
    $server="localhost";
    $db="mmweb";
    $con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());
    $sql = "SELECT c.idCotizacion,c.cotizacion,c.idCliente,cl.nombre,cl.apellido,cl.correo FROM cliente cl
		        inner join cotizacion c on cl.idCliente = c.idCliente WHERE `nombre` LIKE '$idCliente%' OR apellido like '$idCliente%' or cl.idCliente LIKE '$idCliente%';";
    $result = $con->query($sql);
}else if(isset($_GET['todo'])) {
	$user="root";
	$pass="";
	$server="localhost";
	$db="mmweb";
	$con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());
	$sql = "SELECT c.idCotizacion,c.cotizacion,c.idCliente,cl.nombre,cl.apellido,cl.correo FROM cotizacion c
	        inner join cliente cl on cl.idCliente = c.idCliente";
	$result = $con->query($sql);
}
else{
	$user="root";
	$pass="";
	$server="localhost";
	$db="mmweb";
	$con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());
	$sql = "SELECT c.idCotizacion,c.cotizacion,c.idCliente,cl.nombre,cl.apellido,cl.correo FROM cotizacion c
	        inner join cliente cl on cl.idCliente = c.idCliente";
	$result = $con->query($sql);
}
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
			<div class="row">
				<form action="cotizaciones.php" method="get">
					<div class="busqueda">
						<input type="text" id="idCl" value="<?php echo $datos['idCliente']; ?>" name="idCl" required>
						<input type="hidden" name="accion" value="<?php echo $accion; ?>">
						<button type="submit" name="buscar" class="busqueda"> <i class="fa fa-search"></i> </button>
						<a href="subirCotizacion.php"><button  type="button" class="fa fa-plus" id="add"></button></a>
						<a href="cotizaciones.php" class="a" id="verTodo">Ver todo</a>
						<a href="menuEStatus.php" class="a">Volver</a>
					</div>
				</form>

				<script type="text/javascript">
					function confirmarBorrar() {
						var respuesta = confirm("¿Desea eliminar este elemento?");
						if(respuesta == true){
							return true;
						}else{
							return false;
						}
					}
				</script>

				<div class="contenedorTabla">
					<table class="tabla">
						<thead>
							<tr>
								<th>ID COTIZACIÓN</th>
								<th>ARCHIVO</th>
	              <th>ID CLIENTE</th>
								<th>NOMBRE</th>
								<th>APELLIDO</th>
								<th>CORREO</th>
							</tr>
						</thead>

						<tbody class="tablab">
							<?php while($row = $result->fetch_array(MYSQLI_ASSOC)) { $rann = rand(22,99999);?>
								<tr>
									<td> <input  class="idC" type="text" name="" value="<?php echo $row['idCotizacion']; $idCotizacion = $row['idCotizacion']?>"> </td>
									<td> <a href="documentos\Cotizacion<?php echo $row['idCliente'];?>.pdf?t=<?php echo $rann; ?>" target="_blank"><button id="pdf" type="button"><?php echo $row['cotizacion'];?></button></a></td>
									<td> <input type="text" name="" value="<?php echo $row['idCliente']; ?>"> </td>
									<td> <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>" readonly></input></td>
									<td> <input type="text" name="apellido" value="<?php echo $row['apellido']; ?>" readonly></input></td>
									<td> <input type="text" name="correo" value="<?php echo $row['correo']; ?>" readonly></input></td>
									<td><a class="icons" id="iconsBasura" href="cotizaciones.php?accion=eliminar&&idCotizacion=<?php echo $row['idCotizacion']; ?>&&idCliente=<?php echo $row['idCliente']; ?>" onclick="return confirmarBorrar()"> <i class="fa fa-trash"></i> </a></td>
									<td><a class="icons" id="iconsMod" href="modificarCotizacion.php?accion=modificar&&idCotizacion=<?php echo $row['idCotizacion']; ?>&&idCliente=<?php echo $row['idCliente']; ?>"><i  class="fa fa-gear"></a></td>
									<td><a href="evento.php?accion=evento&&idCotizacion=<?php echo $row['idCotizacion']; ?>&&idCliente=<?php echo $row['idCliente']; ?>"><button id="pdf" type="button" id="Evento">Evento</button></a></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>

				</div>
			</div>

		</div>

	</body>
</html>
