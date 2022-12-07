<?php
$accion='';
$res='';
$fin='';
include 'uploadI.php';
include ''


   $user="root";
   $pass="";
   $server="localhost";
   $db="mmweb";
   $con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());

   $sql="INSERT INTO `imagenes` (`idImagen`, `imagen`, `idEventoAnterior`) VALUES ('$this->idImagen','$this->imagen.jpg','$this->fin')";
   $result = $con->query($sql);
 ?>
