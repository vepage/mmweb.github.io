<?php

if ( (isset($_GET['accion'])) && (isset($_GET['idContacto'])) && (is_numeric($_GET['idContacto'])) && ($_GET['accion'] == 'editar')) {
	$idContacto = $_GET['idContacto'];
	$prueba =Pruebas::soloId($idContacto);
	$array = $prueba->selectId();
	$datos = $array->fetch_array();
	$accion ='update';
}
if ((isset($_GET['accion'])) && (isset($_GET['idContacto'])) && (is_numeric($_GET['idContacto'])) && ($_GET['accion'] == 'eliminar')) {
	$idContacto = $_GET['idContacto'];
	$prueba =Pruebas::soloId($idContacto);
	$array = $prueba->delete();
}
?>
