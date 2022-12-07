<?php
if ( (isset($_GET['accion'])) && (isset($_GET['idCliente'])) && (is_numeric($_GET['idCliente'])) && ($_GET['accion'] == 'editar')) {
	$idCliente = $_GET['idCliente'];
	$prueba =Pruebas::soloId($idCliente);
	$array = $prueba->selectId();
	$datos = $array->fetch_array();
	$accion ='update';
}
if ((isset($_GET['accion'])) && (isset($_GET['idCliente'])) && (is_numeric($_GET['idCliente'])) && ($_GET['accion'] == 'eliminar')) {
	$idCliente = $_GET['idCliente'];
	$prueba =Pruebas::soloId($idCliente);
	$array = $prueba->delete();
}
?>
