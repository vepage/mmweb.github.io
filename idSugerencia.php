<?php
//include 'D:\XAMPP\htdocs\MMWEB\Registro\principal.php';

class Pruebas{
 protected $sugerencia;
 protected $idCl;
 protected $idEvento;
 protected $Estado = "Activo";

 public function __construct($sugerencia, $idCl,$idSugerencia,$idEvento = ''){
   $user="root";
   $pass="";
   $server="localhost";
   $db="mmweb";
   $con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());
   $this->idSugerencia= $con->real_escape_string($idSugerencia);
   $this->sugerencia= $con->real_escape_string($sugerencia);
   $this->idCl = $con->real_escape_string($idCl);
   $this->idEvento = $con->real_escape_string($idEvento);
 }
   public function insert(){
   $user="root";
   $pass="";
   $server="localhost";
   $db="mmweb";
   $con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());
   $sql = "INSERT INTO sugerencias(idEvento, descripcion,estado,idCliente)
            VALUES ('$this->idEvento','$this->sugerencia','$this->Estado','$this->idCl')";

   $con->query($sql) ? header("location: cotizacionCliente.php?res=insertado") : header("location: cotizacionCliente.php?res=error");

 }
 public function insertar(){
   $con=new conectar();
   $sql = "INSERT INTO sugerencias(idEvento, descripcion,estado,idCliente)
            VALUES ('$this->idEvento','$this->sugerencia','$this->Estado','$this->idCl')";
   $con->query($sql) ? header("location: cotizacionCliente.php?res=insertado" ) : header("location: cotizacionCliente.php?res=error");
 }

 }

?>
