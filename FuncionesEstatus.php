<?php
//include 'D:\XAMPP\htdocs\MMWEB\Registro\principal.php';


class Pruebas{
 protected $idCot;
 protected $cot;
 protected $idCl;

 public function __construct($cot, $idCl,$idCot = ''){
   $user="root";
   $pass="";
   $server="localhost";
   $db="mmweb";
   $con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());
   $this->idCot= $con->real_escape_string($idCot);
   $this->cot= $con->real_escape_string($cot);
   $this->idCl = $con->real_escape_string($idCl);
 }
 public function delete(){
   $user="root";
   $pass="";
   $server="localhost";
   $db="mmweb";
   $con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());
   $sql= "DELETE FROM `estatus` WHERE (`idEstatus`='$this->idCot')";
   $con->query($sql) ? header("location: MEstatus.php?res=Eliminado&&idCliente=$this->idCl") : header("location: MEstatus.php?res=error");

 }
 public function insert(){
   $user="root";
   $pass="";
   $server="localhost";
   $db="mmweb";
   $con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());
   $nombre="Estatus";
   $nombre2=$nombre.$this->idCl;
   $sql = "INSERT INTO `estatus`(`EstatusCliente`, `idCliente`) VALUES ('$nombre2.pdf','$this->idCl')";
   $con->query($sql) ? header("location: MEstatus.php?res=insertado") : header("location: MEstatus.php?res=error");
 }

 public function select(){
   $user="root";
   $pass="";
   $server="localhost";
   $db="mmweb";
   $con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());
   $sql = "SELECT * FROM `estatus` WHERE `idCliente` LIKE '$this->idCl%';";
   $result = $con->query($sql);
   return $result;
 }

 static function ningunDato(){
   return new self('', '', '');
 }
 static function soloId($idCl,$idCot){
   return new self('',$idCl,$idCot);
 }

 public function update(){
   $user="root";
   $pass="";
   $server="localhost";
   $db="mmweb";
   $con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());
   $nombre="Estatus";
   $nombre2=$nombre.$this->idCl;
   $sql = "UPDATE `estatus` SET `EstatusCliente`='$nombre2.pdf' WHERE `idEstatus` = $this->idCot";
   $con->query($sql) ? header("location: MEstatus.php?res=editado") : header("location: MEstatus.php?res=error");
 }
 public function selectId(){
   $user="root";
   $pass="";
   $server="localhost";
   $db="mmweb";
   $con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());
   $sql = "SELECT * FROM `estatus` WHERE `idEstatus` = $this->idCot";
   $result = $con->query($sql);
   return $result;
 }
 public function insertar(){
   $con=new conectar();
   $sql = "INSERT INTO `contacto`(`nombre`, `asunto`, `correo`) VALUES ('$this->Nombre', '$this->Apellido', '$this->Correo_electronico')";
   $con->query($sql) ? header("location: index.php?res=insertado") : header("location: index.php?res=error");
 }
 public function entrar(){
   $con=new conectar();
   $sql="SELECT `Correo_electronico` FROM `registros` WHERE `Correo_electronico`='$this->Correo_electronico'";
   $con->query($sql);
   if ($db->affected_rows>0){
     echo "<a href='file:///C:/xampp/htdocs/michoacan/presentacion.html'>Ingresar</a>";
   }
   else{
     echo "Usted no esta registrado";
   }
 }
}
?>
