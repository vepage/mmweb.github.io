<?php
if ((isset($_GET['accion'])) && (isset($_GET['idSugerencia'])) && (is_numeric($_GET['idSugerencia'])) && ($_GET['accion'] == 'eliminar')) {
	$idSugerencia = $_GET['idSugerencia'];
	$prueba =PruebasSug::soloId($idSugerencia);
	$array = $prueba->delete();
}

if ( (isset($_GET['accion'])) && (isset($_GET['idSugerencia'])) && (is_numeric($_GET['idSugerencia'])) && ($_GET['accion'] == 'destacar')) {
	$idSugerencia = $_GET['idSugerencia'];
	$prueba =PruebasSug::soloId($idSugerencia);
	$array = $prueba->soloId($idSugerencia);
	$accion ='update';
}
?>
