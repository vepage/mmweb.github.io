<?php
if ( (isset($_GET['accion'])) && (isset($_GET['idCotizacion'])) && (is_numeric($_GET['idCotizacion'])) && ($_GET['accion'] == 'modificar')) {
	$idCliente = $_GET['idCliente'];
	$idCotizacion = $_GET['idCotizacion'];
	$prueba =Pruebas::soloId($idCliente,$idCotizacion);
	$array = $prueba->selectId();
	$datos = $array->fetch_array();
	$accion ='update';
}
if ((isset($_GET['accion'])) && (isset($_GET['idCotizacion'])) && (is_numeric($_GET['idCotizacion'])) && ($_GET['accion'] == 'eliminar')) {
	$idCotizacion = $_GET['idCotizacion'];
	$idCliente = $_GET['idCliente'];
	$user="root";
	$pass="";
	$server="localhost";
	$db="mmweb";
	$con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());
	//id cot de evento
	$idEveCot="SELECT `idCotizacion` FROM `evento` WHERE `idCotizacion` = $idCotizacion";
	$result2 = $con->query($idEveCot);
	//row de id cotizacion de evento
	$row= $result2->fetch_array(MYSQLI_ASSOC);
	if($row['idCotizacion']==$idCotizacion){
		header('location: cotizacionDependiente.php?res=DatoDependiente');
	}else{
		$prueba =Pruebas::soloId($idCliente,$idCotizacion);
		$array = $prueba->delete();
	}
}
?>
