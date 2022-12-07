<?php
if ((isset($_GET['accion'])) && (isset($_GET['idImagen'])) && (is_numeric($_GET['idImagen'])) && ($_GET['accion'] == 'eliminar')) {
	$idImagen = $_GET['idImagen'];
	$prueba =PruebaImg::soloId($idImagen);
	$array = $prueba->delete();
}

?>
