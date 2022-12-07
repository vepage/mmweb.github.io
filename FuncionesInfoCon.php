<?php
//include 'D:\XAMPP\htdocs\MMWEB\Registro\principal.php';

class Pruebas{
 protected $Nombre;
 protected $Telefono;
 protected $Correo;
 protected $idContacto;

 public function __construct($nom,$tel,$correo,$idContacto = ''){
   $user="root";
   $pass="";
   $server="localhost";
   $db="mmweb";
   $con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());
   $this->Nombre= $con->real_escape_string($nom);
   $this->Telefono= $con->real_escape_string($tel);
   $this->Correo = $con->real_escape_string($correo);
   $this->idContacto = $con->real_escape_string($idContacto);
 }

 public function insert(){
   $user="root";
   $pass="";
   $server="localhost";
   $db="mmweb";
   $con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());
   $sql = "INSERT INTO `contacto_previo`(`noTelefono`, `nombre`,`correo`) VALUES ('$this->Telefono','$this->Nombre','$this->Correo')";
   $con->query($sql) ? header("location: InfoContacto.php?res=insertado") : header("location: InfoContacto.php?res=error");
 }


 public function insertar(){
   $con=new conectar();
   $sql = "INSERT INTO `contacto_previo`(`nombre`, `noTelefono`, `correo`) VALUES ('$this->Nombre','$this->Telefono','$this->Correo')";
   $con->query($sql) ? header("location: InfoContacto.php?res=insertado") : header("location: InfoContacto.php?res=error");
 }

}
?>
