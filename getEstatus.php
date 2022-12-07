<?php
if ( (isset($_GET['accion'])) && (isset($_GET['idEstatus'])) && (is_numeric($_GET['idEstatus'])) && ($_GET['accion'] == 'modificar')) {
	$idCliente = $_GET['idCliente'];
	$idCotizacion = $_GET['idEstatus'];
	$prueba =Pruebas::soloId($idCliente,$idCotizacion);
	$array = $prueba->selectId();
	$datos = $array->fetch_array();
	$accion ='update';
}
if ((isset($_GET['accion'])) && (isset($_GET['idEstatus'])) && (is_numeric($_GET['idEstatus'])) && ($_GET['accion'] == 'eliminar')) {
	$idCotizacion = $_GET['idEstatus'];
	$idCliente = $_GET['idCliente'];
	$user="root";
	$pass="";
	$server="localhost";
	$db="mmweb";
	$con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());
		$prueba =Pruebas::soloId($idCliente,$idCotizacion);
		$array = $prueba->delete();
}
?>
