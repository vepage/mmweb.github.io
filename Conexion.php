<?php

	function conectar(){

			$user="root";
			$pass="";
			$server="localhost";
			$db="mmweb";
			$con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());

			return $con;

	}

?>
