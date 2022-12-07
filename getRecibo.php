<?php
if ( (isset($_GET['accion'])) && (isset($_GET['idRecibo'])) && (is_numeric($_GET['idRecibo'])) && ($_GET['accion'] == 'modificar')) {
	$idCliente = $_GET['idCliente'];
	$idCotizacion = $_GET['idRecibo'];
	$prueba =Pruebas::soloId($idCliente,$idCotizacion);
	$array = $prueba->selectId();
	$datos = $array->fetch_array();
	$accion ='update';
}
if ((isset($_GET['accion'])) && (isset($_GET['idRecibo'])) && (is_numeric($_GET['idRecibo'])) && ($_GET['accion'] == 'eliminar')) {
	$idCotizacion = $_GET['idRecibo'];
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
