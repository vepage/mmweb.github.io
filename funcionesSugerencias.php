<?php
class PruebasSug{
 protected $idSug;
 protected $idEven;
 protected $descrip;
 protected $estad;
 protected $idClien;

 public function __construct($idSug, $idEv, $desc,$estadoD,$idCli){
   $user="root";
   $pass="";
   $server="localhost";
   $db="mmweb";
   $con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());
   $this->idSug= $con->real_escape_string($idSug);
   $this->idEven = $con->real_escape_string($idEv);
   $this->descrip= $con->real_escape_string($desc);
   $this->estad= $con->real_escape_string($estadoD);
   $this->idClien = $con->real_escape_string($idCli);
 }

//función para obtener id
 public function selectId(){
    $user="root";
    $pass="";
    $server="localhost";
    $db="mmweb";
    $con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());
   $sql = "SELECT * FROM `sugerencias` WHERE `idSugerencias` = $this->idSug";
   $result = $con->query($sql);
   return $result;
 }

 //función para borrar la sugerencia
 public function delete(){
   $user="root";
   $pass="";
   $server="localhost";
   $db="mmweb";
   $con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());
   $sql="DELETE FROM `sugerencias` WHERE idSugerencia=$this->idSug";
   $con->query($sql) ? header("location: VerSugerencias.php?res=Eliminado") : header("location: VerSugerencias.php?res=error");
 }

 //función para destacar sugerencias
 public function update(){
   $user="root";
   $pass="";
   $server="localhost";
   $db="mmweb";
   $con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());
   $sql = "UPDATE `sugerencias` SET `estado`='$this->estadoD' WHERE `idSugerencia`=$this->idSug";
   $con->query($sql) ? header("location: VerSugerencias.php?res=destacado") : header("location: VerSugerencias.php?res=error");
 }


 static function soloId($idSug){
   return new self($idSug,'','','','');
 }


}
?>
