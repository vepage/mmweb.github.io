<?php
//include 'D:\XAMPP\htdocs\MMWEB\Registro\principal.php';

class Pruebas{
 protected $Nombre;
 protected $Apellido;
 protected $Telefono;
 protected $Clave;
 protected $Correo_electronico;
 protected $Id_Cliente;
 protected $Tipo;

 public function __construct($nom, $apell, $correo,$tel,$clave,$Id_Cliente = '',$Tipo='0'){
   $user="root";
   $pass="";
   $server="localhost";
   $db="mmweb";
   $con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());
   $this->Nombre= $con->real_escape_string($nom);
   $this->Apellido = $con->real_escape_string($apell);
   $this->Telefono= $con->real_escape_string($tel);
   $this->Clave = $con->real_escape_string($clave);
   $this->Correo_electronico = $con->real_escape_string($correo);
   $this->Id_Cliente = $con->real_escape_string($Id_Cliente);
   $this->Tipo = $con->real_escape_string($Tipo);
 }
 public function delete(){
   $user="root";
   $pass="";
   $server="localhost";
   $db="mmweb";
   $con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());
   $sql="DELETE FROM `contacto_previo` WHERE `idContacto`=$this->Id_Cliente";
   $con->query($sql) ? header("location: visualizarContPrev.php?res=Eliminado") : header("location: visualizarContPrev.php?res=error");
 }
 public function insert(){
   $user="root";
   $pass="";
   $server="localhost";
   $db="mmweb";
   $con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());
   $sql = "INSERT INTO `cliente`(`noTelefono`, `nombre`, `apellido`, `correo`, `clave`, `Tipo`) VALUES ('$this->Telefono','$this->Nombre', '$this->Apellido', '$this->Correo_electronico',  '$this->Clave' ,'$this->Tipo')";
   $con->query($sql) ? header("location:clientes.php?res=insertado") : header("location: agregaCliente.php?res=error");
 }

 public function select(){
   $user="root";
   $pass="";
   $server="localhost";
   $db="mmweb";
   $con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());
   $sql = "SELECT `idCliente`, `noTelefono`, `nombre`, `apellido`, `correo`, `clave` FROM `cliente`";
   $result = $con->query($sql);
   return $result;
 }

 static function ningunDato(){
   return new self('', '', '','');
 }
 static function soloId($Id_Cliente){
   return new self('','','','','',$Id_Cliente,'');
 }

 public function update(){
   $user="root";
   $pass="";
   $server="localhost";
   $db="mmweb";
   $con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());
   $sql = "UPDATE `cliente` SET `noTelefono`='$this->Telefono',`nombre`='$this->Nombre',`apellido`='$this->Apellido',`correo`='$this->Correo_electronico',`clave`='$this->Clave',`Tipo`='$this->Tipo' WHERE `idCliente`=$this->Id_Cliente";
   $con->query($sql) ? header("location: clientes.php?res=editado") : header("location: clientes.php?res=error");
 }
 public function selectId(){
   $user="root";
   $pass="";
   $server="localhost";
   $db="mmweb";
   $con=mysqli_connect($server,$user,$pass,$db) or die ("Error en la conexión".mysql_error());
   $sql = "SELECT * FROM `cliente` WHERE `idCliente` = $this->Id_Cliente";
   $result = $con->query($sql);
   return $result;
 }
 public function insertar(){
   $con=new conectar();
   $sql = "INSERT INTO `contacto`(`nombre`, `asunto`, `correo`) VALUES ('$this->Nombre', '$this->Apellido', '$this->Correo_electronico')";
   $con->query($sql) ? header("location: agregaCliente.php?res=insertado") : header("location: agregaCliente.php?res=error");
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
