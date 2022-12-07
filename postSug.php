<?php
include 'funcionesSugerencias.php';
if (isset($_POST['submit'])) {
	if ($_POST['accion']=='update') {

    $idSugerencia =$_POST['idSugerencia'];
		$estadoD = $_POST['estadoSug'];

    echo "estadoD";

    $user="root";
    $pass="";
    $server="localhost";
    $db="mmweb";
    $con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());
    $sql = "UPDATE `sugerencias` SET `estado`='$estadoD' WHERE `idSugerencia`=$idSugerencia";
    $con->query($sql) ? header("location: VerSugerencias.php?res=destacado") : header("location: VerSugerencias.php?res=error");

}
}
?>
