
<?php
$accion='';
$res = '';
$idCliente = '';
$datos = array('EstatusCliente'=>'', 'idCliente'=>'','idEstatus'=>'');
include 'funcionesEstatus.php';
include 'getEstatus.php';
if(isset($_GET['res'])){
	if($_GET['res']=='Eliminado'){
		$idCliente=$_GET['idCliente'];
		array_map('unlink', glob("Estatus/Estatus$idCliente.pdf"));
	}
}
if((isset($_GET['buscar']))) {
		$idCliente = $_GET['idCl'];
		$user="root";
    $pass="";
    $server="localhost";
    $db="mmweb";
    $con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());
    $sql = "SELECT * FROM `estatus` WHERE `idCliente` LIKE '$idCliente%';";
    $result = $con->query($sql);
}else if(isset($_GET['todo'])) {
	$user="root";
	$pass="";
	$server="localhost";
	$db="mmweb";
	$con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());
	$sql = "SELECT `idEstatus`, `EstatusCliente`, `idCliente` FROM `estatus`";
	$result = $con->query($sql);
}
else{
	$user="root";
	$pass="";
	$server="localhost";
	$db="mmweb";
	$con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());
	$sql = "SELECT `idEstatus`, `EstatusCliente`, `idCliente` FROM `estatus`";
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
			<h1 class="w">ESTATUS</h1>
			<div class="row">
				<form action="MEstatus.php" method="get">
					<div class="busqueda">
						<input type="text" id="idCl" value="<?php echo $datos['idCliente']; ?>" name="idCl" required>
						<input type="hidden" name="accion" value="<?php echo $accion; ?>">
						<button type="submit" name="buscar" class="busqueda"> <i class="fa fa-search"></i> </button>
						<a href="estatus.php"><button  type="button" class="fa fa-plus" id="add"></button></a>
						<a href="MEstatus.php"  class="a" id="verTodo">Ver todo</a>
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
				<table class="tabla" >
					<thead>
						<tr>
							<th>idEstatus</th>
							<th>Archivo Estatus</th>
              <th>ID del Cliente</th>
						</tr>
					</thead>

					<tbody class="tablab">
						<?php while($row = $result->fetch_array(MYSQLI_ASSOC)) { $rann = rand(22,99999);?>
							<tr>
								<td> <input  class="idC" type="text" name="" value="<?php echo $row['idEstatus']; $idCotizacion = $row['idEstatus']?>"> </td>
								<td> <a href="Estatus\Estatus<?php echo $row['idCliente'];?>.pdf?t=<?php echo $rann; ?>" target="_blank"><button id="pdf" type="button"><?php echo $row['EstatusCliente'];?></button></a></td>
								<td> <input type="text" name="" value="<?php echo $row['idCliente']; ?>"> </td>
								<td><a class="icons" id="iconsBasura" href="MEstatus.php?accion=eliminar&&idEstatus=<?php echo $row['idEstatus']; ?>&&idCliente=<?php echo $row['idCliente']; ?>" onclick="return confirmarBorrar()"> <i class="fa fa-trash"></i> </a></td>
								<td><a class="icons" id="iconsMod" href="modificarEstatus.php?accion=modificar&&idEstatus=<?php echo $row['idEstatus']; ?>&&idCliente=<?php echo $row['idCliente']; ?>"><i  class="fa fa-gear"></a></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>

			</div>

			</div>
		</div>

	</body>
</html>
